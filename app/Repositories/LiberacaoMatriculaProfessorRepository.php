<?php

namespace App\Repositories;

use App\Models\LiberacaoMatriculaProfessor;

class LiberacaoMatriculaProfessorRepository extends AbstractRepository {
    protected $model = LiberacaoMatriculaProfessor::class;
    public function __construct(LiberacaoMatriculaProfessor $model)
    {
        $this->model = $model;
    }
    
}
?>