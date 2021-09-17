<?php
namespace App\Services;

use App\Exceptions\SalarioException;
use App\Helpers\FinancialHelper;
use App\Models\InformeProfessor;
use App\Repositories\AulaTesteRepository;
use App\Repositories\InformeEscolaRepository;
use App\Repositories\InformeProfessorRepository;
use App\Repositories\MensalidadeRepository;
use App\Repositories\ProfessorRepository;
use App\Repositories\ReajusteRepository;
use App\Repositories\SalarioRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class SalarioServices {
    protected $mensalidadeRepository, $salarioRepository, $informeProfessorRepository, $reajusteRepository, $informeEscolaRepository, $professorRepository, $aulaTesteRepository;
    protected $mes, $ano, $salarios;
    public function __construct(
        MensalidadeRepository $mensalidadeRepository,
        ProfessorRepository $professorRepository,
        SalarioRepository $salarioRepository,
        InformeProfessorRepository $informeProfessorRepository,
        ReajusteRepository $reajusteRepository,
        InformeEscolaRepository $informeEscolaRepository,
        AulaTesteRepository $aulaTesteRepository
    )
    {
        $this->mensalidadeRepository = $mensalidadeRepository;
        $this->professorRepository = $professorRepository;
        $this->salarioRepository = $salarioRepository;
        $this->informeProfessorRepository = $informeProfessorRepository;
        $this->reajusteRepository = $reajusteRepository;
        $this->informeEscolaRepository = $informeEscolaRepository;
        $this->aulaTesteRepository = $aulaTesteRepository;

    }
    private function setData($mes, $ano) {
        $this->mes = $mes;
        $this->ano = $ano;
    }
    private function verifyControle() {
        $controle = DB::table('controles_salarios')->where('mes', $this->mes)->where('ano', $this->ano)->first();
        if(!is_null($controle)) {
            throw new SalarioException('Não rolou');
        }
    }
    public function gerarSalarios($mes, $ano) {
        $this->prepare($mes, $ano);
        $this->criarRegistroSalario($this->getInformes());
        $this->storeControle();
        return true;
    }
    private function storeControle() {
        return DB::table('controles_salarios')->insert(['mes' => $this->mes, 'ano' => $this->ano]);
    }
    private function prepare($mes, $ano) {
        $this->setData($mes, $ano);
        $this->verifyControle();
        $this->generateSalarios();
    }
    private function generateSalarios() {
        $salarios = collect();
        foreach($this->professorRepository->all() as $professor) {
            $salarios->add($this->salarioRepository->add([
                    'id_professor' => $professor->id,
                    'mes' => $this->mes,
                    'ano' => $this->ano
                ]));
        }
        $this->salarios = $salarios;
    }
    private function getInformes() {
        $informes = $this->getInformesFromMensalidades();
        $informesAulaTeste = $this->getInformesFromAulasTeste();
        $informes = $informes->merge($informesAulaTeste);
        return $informes;
    }
    private function getInformesFromMensalidades(){
        $informes = collect();
        $mensalidades = $this->mensalidadeRepository->getByData($this->mes,$this->ano);
        foreach($mensalidades as $mensalidade) {
            if($mensalidade->valor > 0 ){
                $informes->add($this->gerarInformes($mensalidade) );
            }
        }
        return $informes;
    }
    private function getInformesFromAulasTeste() {
        $informes = collect();
        $aulasTeste = $this->aulaTesteRepository->getByData($this->mes,$this->ano);
        foreach($aulasTeste as $aulaTeste) {
            if($this->checkAulaRealizada($aulaTeste) != null ) {
                $informeProfessor = [
                    'valor' => FinancialHelper::getPercentage($aulaTeste->valor, $aulaTeste->porcentagem_professor),
                    'id_professor' => $aulaTeste->professor->id,
                    'id_aula' => $aulaTeste->id,
                    'id_salario' => $this->salarios->where('id_professor', $aulaTeste->professor->id)->first()->id,
                    'qtd_aulas_realizadas' => $aulaTeste->count()
                ];
                $informeProfessor = $this->informeProfessorRepository->add($informeProfessor);
                $informes->add($informeProfessor);
                $this->gerarInformeEscola($aulaTeste->valor, $aulaTeste);
            }
        }
        return $informes;
    }


    private function criarRegistroSalario($informes) {
        foreach($this->salarios as $salario) {
            $salario->valor = $informes->flatten()->where('id_salario', $salario->id)->sum('valor');
            $salario->save();
        }
        DB::table('controles_salarios')->insert([
            'mes' => $this->mes,
            'ano' => $this->ano
        ]);
    }
    private function gerarInformes($mensalidade) {
        $aulasProfessor = $this->separarAulasPorProfessor($mensalidade);
        $total = 0;
        $informes = collect();
        foreach($aulasProfessor as $professor) {
            $informeProfessor = [
                'valor' => $this->getParteProfessor($mensalidade, $professor['qtd_aulas_realizadas']),
                'id_professor' => $professor['professor']->id,
                'id_mensalidade' => $mensalidade->id,
                'id_salario' => $this->salarios->where('id_professor', $professor['professor']->id)->first()->id,
                'qtd_aulas_realizadas' => $professor['qtd_aulas_realizadas']
            ];
            $informeProfessor = $this->informeProfessorRepository->add($informeProfessor);
            $informes->add($informeProfessor);
            $total = $total + $informeProfessor->valor;
        }
        if($total > 0) {
            $this->gerarInformeEscola($total, $mensalidade);
        }
        return $informes;
    }
    private function separarAulasPorProfessor($mensalidade) {
        $aulasProfessores = $mensalidade->matricula->aulas()->doMes($this->mes, $this->ano)->groupBy('id_professor');
        $info = [];
        foreach($aulasProfessores as $aulasProfessor) {
            $infoProfessor['professor'] = $aulasProfessor->first()->professor;
            $infoProfessor['qtd_aulas_realizadas'] = $this->getQtdAulasValidasCobranca($aulasProfessor);
            array_push($info, $infoProfessor);
        }
        return $info;

    }
    private function getParteProfessor($mensalidade, $qtdAulas) {
        $valor = $this->descontarReajuste($mensalidade->valor);
        $valor = $this->verifyDesconto($mensalidade);
        if($qtdAulas < $mensalidade->qtd_aulas_previstas) {
            $valor = $this->calcularValorPorAula($valor, $mensalidade->qtd_aulas_previstas,  $qtdAulas);
        }
        return FinancialHelper::getPercentage($valor, $mensalidade->matricula->porcentagem_professor);
    }
    private function verifyDesconto($mensalidade) {
        if($mensalidade->matricula->desconto != null && strtolower($mensalidade->matricula->desconto->motivo) != 'turma' ) {
            return $mensalidade->matricula->modalidade->valor;
        }
        return $mensalidade->valor;
    }
    private function calcularValorPorAula($valor, $qtdaulasPrevistas,  $qtdAulasValidas) {
        return ($valor/$qtdaulasPrevistas)*$qtdAulasValidas;
    }
    private function getQtdAulasValidasCobranca($aulas) {
        return $aulas->where('status','!=', 'cancelada')->where('tipo', '!=', 'recuperacao')->count();
    }
    private function checkAulaRealizada($aula) {
        if($aula->status == 'cancelada' || $aula->status == 'recuperacao') {
            return null;
        }
        return $aula;
    }
    private function descontarReajuste($valor) {
        // $reajuste = ReajusteRepository::getReajusteAnual(now()->year);
        // return $valor - $reajuste;
        return $valor;
    }
    private function gerarInformeEscola($total, $referencia) {
        if(strtolower(class_basename($referencia)) == 'mensalidade') {
            $informeEscola = [
                'id_mensalidade' => $referencia->id,
                'valor' => $referencia->valor - $total
            ];
        } else {
            $informeEscola = [
                'id_aula' => $referencia->id,
                'valor' => $referencia->valor - $total
            ];
        }
        return $this->informeEscolaRepository->add($informeEscola);
    }
}
?>
