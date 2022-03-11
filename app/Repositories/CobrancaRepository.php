<?php 

namespace App\Repositories;

use App\Models\Cobranca;
//Fazer repository diferente para mensalidade e matricula?
class CobrancaRepository extends AbstractRepository {
        protected $model = Cobranca::class;
        public function __construct(Cobranca $model)
        {
            $this->model = $model;
        }
        public function getByData($mes,$ano) {
            return $this->model->where('mes',$mes)->where('ano',$ano)->get();
        }
    }
?>