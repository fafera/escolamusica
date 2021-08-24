<?php

namespace App\Repositories;

use App\Models\Aula;
use App\Models\AulaTeste;

class AulaRepository extends AbstractRepository {
    protected $model = Aula::class, $aulaTesteModel = AulaExtra::class;
    public function __construct(Aula $model, AulaTeste $aulaTesteModel)
    {
        $this->model = $model;
        $this->aulaTesteModel = $aulaTesteModel;
    }
    public function store() {
        if(is_null((request()->get('id_matricula')))) {
            return $this->aulaTesteModel::create(request()->except('_token'));
        }
        return $this->model::create(request()->except('_token'));
    }
    public function update($id) {
        if(is_null((request()->get('id_matricula')))) {
            $object = $this->aulaTesteModel::findOrFail($id);
        } else {
            $object = $this->model::findOrFail($id);
        }
        $array = request()->except('_token');
        $array['status'] = $this->checkStatus(request());
        $array['tipo'] = $this->checkTipo(request());
        return tap($object)->update($array);
    }
    public function delete($id) {
        if(request()->get('tipo') == 'delete-aula-extra') {
            $object = $this->aulaTesteModel::findOrFail($id);
        } else {
            $object = $this->model::findOrFail($id);
        }
        return $object->delete();
      }
    private function checkStatus($request) {
        if(is_null($request->get('status'))) {
            return 'realizada';
        }
        return $request->get('status');
    }
    private function checkTipo($request) {
        if(is_null($request->get('tipo'))) {
            return 'padrao';
        }
        return $request->get('tipo');
    }
}
?>