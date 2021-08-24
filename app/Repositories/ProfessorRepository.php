<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Professor;
use App\Repositories\AbstractRepository;

class ProfessorRepository extends AbstractRepository{
  protected $model = Professor::class;
  public function alunos() {
    return $this->alunos;
  }
  public function matriculas($id) {
    return $this->matriculas;
  }
  public function aulas($id) {
    return $this->aulas;
  }
  public function agenda($id) {
    return $this->separarAgendaPorDia(
      $this->matriculas->orderBy('dia_da_semana', 'ASC')->orderBy('horario', 'ASC')->get()
    );
  }
  private function separarAgendaPorDia($collection) {
    for($i=Carbon::now()->firstWeekDay; $i<=Carbon::now()->lastWeekDay; $i++) {
      if($collection->contains('dia_da_semana', $i))
        $return[$i] = $collection->where('dia_da_semana', $i);
    }
    return collect($return);
  }


}
?>