<?php

namespace App\Repositories;

use App\Models\Cobranca;
use App\Models\Desconto;
use App\Models\Matricula;
use App\Models\Mensalidade;

class MensalidadeRepository extends AbstractRepository {
        protected $model = Mensalidade::class;
        protected $matriculaModel = Matricula::class;
        public function __construct(Mensalidade $model)
        {
            $this->model = $model;
        }
        public function store() {
            $desconto = null;
            if(request()->get('tx_matricula')) {
                $this->storeAppendedTaxaMatricula();
            }
            if(request()->get('desconto')) {
                $desconto = $this->storeAppendedDesconto();
                $desconto = $desconto->id;
            }
            return $this->model::create(request()->except(['_token', 'desconto', 'tx_matricula']) + ['id_desconto' => $desconto] );
        }
        private function storeAppendedTaxaMatricula() {
            $txMatricula = new Cobranca([
                'tipo' => 'matricula',
                'valor' => request()->get('tx_matricula'),
                'id_matricula' => request()->get('id_matricula'),
                'id_aluno' => $this->matriculaModel::find(request()->get('id_matricula'))->aluno->id,
                'data' => date('Y-m-d'),
            ]);
            $txMatricula->save();
            return $txMatricula;
        }
        private function storeAppendedDesconto() {
            $desconto = new Desconto([
                'motivo' => request()->get('desconto'),
                'id_matricula' => request()->get('id_matricula'),
                'valor' => request()->get('valor_desconto')
            ]);
            $desconto->save();
            return $desconto;

        }
        public function getByData($mes,$ano) {
            return $this->model->where('mes',$mes)->where('ano',$ano)->get();
        }
    }
?>