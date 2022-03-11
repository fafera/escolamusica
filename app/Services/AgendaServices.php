<?php
namespace App\Services;

use App\Exceptions\DiaDaSemanaException;
use App\Helpers\DateHelper;
use App\Models\HorarioFuncionamento;
use App\Models\Modalidade;
use App\Models\Professor;
use App\Models\Matricula;
use Carbon\Carbon;

class AgendaServices {
  protected $professor, $modalidade, $horariosFuncionamento, $matriculasDoDia, $diaDaSemana, $flag;
  protected $horariosDoDia = [];
  public function __construct(Professor $professor, $diaDaSemana)
  {
    $this->professor = $professor;
    $this->modalidades = Modalidade::all()->sortBy('duracao');
    $this->diaDaSemana = $diaDaSemana;
    $this->horariosFuncionamento =  $this->getHorariosFuncionamento();
    $this->matriculasDoDia = $this->professor->matriculas()->ativas()->where('dia_da_semana', DateHelper::getWeekDay($this->diaDaSemana))->sortBy('horario');
  }
  private function getHorariosFuncionamento() {
    $horarios = HorarioFuncionamento::where('dia_da_semana', $this->diaDaSemana)->get();
    if($horarios->isEmpty()) {
      throw new DiaDaSemanaException('Dia da semana não rola');
    }
    return $horarios;
  }
  public function getAgendaFromProfessorByWeekDay() {
    foreach($this->horariosFuncionamento as $horarioFuncionamento) {
      $this->horarioAtual = Carbon::parse($horarioFuncionamento->horario_inicial);
      $this->matricula = null;
      $this->flag = true;
      while($this->flag) {
        $this->matricula  = $this->verificarMatriculaHorario();
        if($this->verificarHorarioLimite($horarioFuncionamento)) {
          if(!empty($this->matricula)) {
            $infoHorario = $this->montarArrayInfoMatricula();
            $infoHorario['matricula']['horario_final'] = $this->getHorarioFinalMatricula($this->matricula);
            $this->horarioAtual = $this->getHorarioFinalMatricula($this->matricula);
            $this->matricula = null;
          } else {
            $this->matricula = $this->verificarMatriculaIntervaloHorario($this->horarioAtual);
            
            if($this->matricula != null) {
              if($this->verificaMatriculaLimite()) {
                $infoHorario = $this->montarArrayInfoHorario();
                $infoHorario = $this->setModalidadeMinima($infoHorario);
                $this->horarioAtual = Carbon::parse($this->matricula->horario);
                $this->matricula = null;
              } else {
                $this->horarioAtual = Carbon::parse($this->matricula->horario);
              }
            } else {
              $infoHorario = $this->getHorariosDisponiveis($this->montarArrayInfoHorario(), $horarioFuncionamento);
              $this->horarioAtual = $this->setHorarioAtualMinimaDuracaoModalidade();
              if($this->verificarHorarioLimite($horarioFuncionamento) == false) {
                $this->flag = false;
              }
            }
          }
          if(is_array($infoHorario)) {
            array_push($this->horariosDoDia, $infoHorario);
            $infoHorario = null;
          }
          
        } else {
          $this->flag = false;
        }
      }
    }
    return $this->horariosDoDia;
  }


  private function verificarMatriculaHorario() {    
    if(!is_null($this->matricula)) {
        return $this->matricula;
    } else {
        return $this->matriculasDoDia->where('horario', date('H:i:s',strtotime($this->horarioAtual)))->first();
    }
  }
  private function verificarHorarioLimite($horarioFuncionamento) {
    $horario = $this->getHorarioLimiteModalidade($this->horarioAtual, $this->getModalidadeMenorDuracao());
    if(date('H:i:s',strtotime($horario)) <= date('H:i:s',strtotime($horarioFuncionamento->horario_final))) {
      return true;
    }
    return false;
  }
  private function montarArrayInfoMatricula() {
    $arrayMatricula = [];
    $arrayMatricula['matricula']['aluno'] = $this->matricula->aluno;
    $arrayMatricula['matricula']['info'] = $this->matricula;
    $arrayMatricula['matricula']['horario'] = DateHelper::formatTimestampToBRTime($this->matricula->horario);
    return $arrayMatricula;
  }
  private function montarArrayInfoHorario() {
    $arrayHorario = [];
    $arrayHorario['vaga']['horario'] = DateHelper::formatTimestampToBRTime($this->horarioAtual);
    $arrayHorario['vaga']['limites'] = [];
    return $arrayHorario;
  }
  private function setModalidadeMinima($arrayHorario) {
    return array_push($arrayHorario['vaga']['limites'], array('duracao'=>'30 minutos', 'id'=> $this->modalidades->where('duracao', '00:30:00')->first()->id));
  }
  public function getHorarioFinalMatricula($matricula) {
    $horarioMatricula = Carbon::parse($matricula->horario);
    if(substr($matricula->modalidade->duracao, 0,2) >= 1) {
      $horarioMatricula->addHours(substr($matricula->modalidade->duracao, 0,2));
    } else {
      $horarioMatricula->addMinutes(substr($matricula->modalidade->duracao, 3,2));
    }
    return $horarioMatricula;
    //return DateHelper::formatTimestampToBRTime($this->horarioAtual);
  }
  public function verificarMatriculaIntervaloHorario($horario, $modalidade = null) {
    if(!isset($modalidade)) {
      $modalidade = $this->getModalidadeMenorDuracao();
    }
    //Carbon muda a variavel se não fizer o parse
    $horarioAtual = Carbon::parse($horario);
    $horarioLimite = Carbon::parse($this->getHorarioLimiteModalidade($horario, $modalidade))->subMinutes(1);

    return $this->matriculasDoDia->whereBetween('horario', [date('H:i:s',strtotime($horarioAtual)), date('H:i:s',strtotime($horarioLimite))])->first();
  }
  public function verificarMatriculaIntervaloHorarioFinal($horario) {
    
    $modalidade = $this->getModalidadeMaiorDuracao();
    $duracao = Carbon::parse($modalidade->duracao);
    //Carbon muda a variavel se não fizer o parse
    $horarioAtual = Carbon::parse($horario)->addMinute();
    $horarioAnterior = Carbon::parse($horario)->subHours($duracao->hour)->subMinutes($duracao->minute);
    $matricula = $this->matriculasDoDia->whereBetween('horario', [date('H:i:s',strtotime($horarioAnterior)), date('H:i:s',strtotime($horarioAtual))])->last();
    if($matricula != null) {
      if($matricula->horario <= $horarioAtual && $matricula->horarioFinal >= $horarioAtual) {
        return $matricula;
      }
    }
    return null;
  }
  private function verificaMatriculaLimite() {
    if($this->horarioAtual->diffInMinutes($this->matricula->horario) >= 30) {
      return true;
    }
  return false;
  }
  private function getHorariosDisponiveis($arrayHorario, $horarioFuncionamento) {
    foreach($this->modalidades as $modalidade) {
      $horarioDuracaoModalidade = $this->getHorarioLimiteModalidade($this->horarioAtual, $modalidade);
      if(empty($this->verificarMatriculaIntervaloHorario($this->horarioAtual, $modalidade))) {
        if($horarioDuracaoModalidade <= $horarioFuncionamento->horario_final) {
          array_push($arrayHorario['vaga']['limites'], array('duracao'=> $modalidade->duracaoBRTime, 'id'=> $modalidade->id));
        }
      }
    }
    return $arrayHorario;
  }
  private function getHorarioLimiteModalidade($horario, $modalidade) {
    $horario = Carbon::parse($horario);
    if($modalidade->horaOuMinuto == "minuto") {
      return date('H:i:s',strtotime($horario->addMinutes($modalidade->valorInt)));
    } else {
      return date('H:i:s',strtotime($horario->addHours($modalidade->valorInt)));
    }
  }
  private function setHorarioAtualMinimaDuracaoModalidade() {
    $modalidade = $this->getModalidadeMenorDuracao();
    return Carbon::parse($this->getHorarioLimiteModalidade($this->horarioAtual, $modalidade));
  }
  private function getModalidadeMenorDuracao(){
    return $this->modalidades->sortBy('duracao')->first();
  }
  private function getModalidadeMaiorDuracao(){
    return $this->modalidades->sortBy('duracao')->last();
  }

}
?>
