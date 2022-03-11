<?php
namespace App\Repositories;

use App\Models\Reajuste;

class ReajusteRepository extends AbstractRepository {
        protected $model = Reajuste::class;
        protected static $valor;
        public function __construct(Reajuste $model)
        {
            $this->model = $model;
        }
        
        public static function getReajusteAnual($ano) {
            
            $reajuste = new Reajuste();
            return $reajuste->where('ano', $ano)->first()->valor;
        }
    }
?>