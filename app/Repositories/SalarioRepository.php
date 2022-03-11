<?php

namespace App\Repositories;

use App\Models\Salario;
use App\Repositories\AbstractRepository;

class SalarioRepository extends AbstractRepository{
    protected $model = Salario::class;
    public function __construct(Salario $model)
    {
      $this->model = $model;
    }
    public function delete($id) {
      $salario = $this->get($id);
      $this->deleteInformes($salario);
      return true;
    }
    private function deleteInformes($salario) {
      if(!empty($salario->informesProfessor)) {
        $salario->informesEscola()->delete();
        $salario->informesProfessor()->delete();
        $salario->delete();
      }
    }
    public function getFromProfessor($id, $mes, $ano) {
      return $this->model->where('id_professor', $id)->where('mes', $mes)->where('ano', $ano)->first();
    }
}
?>