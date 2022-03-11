<?php

namespace App\Repositories;

use App\Models\AulaTeste;
use Carbon\Carbon;

class AulaTesteRepository extends AbstractRepository {
    protected $model = AulaTeste::class;
    protected $defaultDay = 1;
    public function __construct(AulaTeste $model)
    {
        $this->model = $model;
    }
    public function getByData($mes,$ano) {
        $data = Carbon::createFromDate($ano, $mes, $this->defaultDay);
        return $this->model->whereBetween('data',[$data->firstOfMonth()->format('Y-m-d'), $data->lastOfMonth()->format('Y-m-d')])->get();
    }
}
?>