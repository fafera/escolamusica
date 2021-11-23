<?php 

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Modalidade;

class ModalidadeRepository extends AbstractRepository {
    protected $model = Modalidade::class;

    public function store() {
        return $this->model::create($this->createDuracaoRequest());
    }
    public function update($id) {
        $object = $this->model::findOrFail($id);
        return tap($object)->update($this->createDuracaoRequest($object));
    }
    public function transformDuracao($modalidade) {
        $duracao = explode(':', $modalidade->duracao);
        $modalidade->horas = $duracao[0];
        $modalidade->minutos = $duracao[1];
        return $modalidade;
    }
    private function createDuracaoRequest() {
        $timestamp = Carbon::parse(request()->get('horas').":".request()->get('minutos'));
        $request['valor'] = request()->get('valor');
        $request['duracao'] = $timestamp->toTimeString();
        return $request;
    }
}
?>