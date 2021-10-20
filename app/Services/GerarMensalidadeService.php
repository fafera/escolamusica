<?php
namespace App\Services;

use Carbon\Carbon;
use App\Helpers\DateHelper;
use Illuminate\Support\Facades\DB;
use App\Repositories\MatriculaRepository;
use App\Repositories\MensalidadeRepository;
use App\Exceptions\GerarMensalidadeException;

class GerarMensalidadeService {
    protected $mes, $ano, $matriculaRepository, $mensalidadeRepository;

    public function __construct($mes, $ano, MatriculaRepository $matriculaRepository, MensalidadeRepository $mensalidadeRepository)
    {
        $this->mes = $mes;
        $this->ano = $ano;
        $this->matriculaRepository = $matriculaRepository;
        $this->mensalidadeRepository = $mensalidadeRepository;
        $this->generate();
    }
    private function generate() {
        $this->verifyControle();
        foreach($this->matriculaRepository->ativas() as $matricula) {
            $this->generateMensalidade($matricula);
        }
        $this->storeControle();
        return true;
    }
    private function storeControle() {
        return DB::table('controle_mensalidades')->insert(['mes' => $this->mes, 'ano' => $this->ano]);
    }
    private function verifyControle() {
        $controle = DB::table('controle_mensalidades')->where('mes', $this->mes)->where('ano', $this->ano)->first();
        if(!is_null($controle)) {
            throw new GerarMensalidadeException();
        }
    }
    private function generateMensalidade($matricula) {
        if($this->verifyMensalidadeMatricula($matricula)) {
            return null;
        }
        $data = $this->buildArrayData($matricula);
        return $this->mensalidadeRepository->add($data);
    }
    private function verifyMensalidadeMatricula($matricula) {
        return $matricula->mensalidades->where('mes' , $this->mes)->where('ano', $this->ano)->first();
    }
    private function buildArrayData($matricula) {
        $data['id_matricula'] = $matricula->id;
        $data['qtd_aulas_previstas'] = $this->getQtdAulasPrevistas($matricula);
        if(!is_null($matricula->desconto)) {
            $data['id_desconto'] = $matricula->desconto->id;
        }
        $data['valor'] = $this->getValor($matricula);
        $data['vencimento'] = $this->getDefaultDataVencimento();
        $data['mes'] = $this->mes;
        $data['ano'] = $this->ano;
        $data['status'] = 'aguardando';
        return $data;
    }
    private function getQtdAulasPrevistas($matricula) {
        return DateHelper::getWeekDaysOnMonth($matricula->diaDaSemanaNumero, $this->mes, $this->ano);
    }
    private function getValor($matricula) {
        if(!is_null($matricula->desconto)) {
            return $matricula->desconto->valor;
        }
        return $matricula->modalidade->valor;
        

    }
    private function getDefaultDataVencimento() {
        return Carbon::parse($this->ano."-".$this->mes."-10")->format('Y-m-d');
    }
}
?>