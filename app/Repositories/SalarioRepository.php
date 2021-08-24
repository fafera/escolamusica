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
}
?>