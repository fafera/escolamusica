<?php

namespace App\Repositories;

use App\Models\Cobranca;
use App\Models\Desconto;
use App\Models\Mensalidade;
use App\Models\Pagamento;

class PagamentoRepository extends AbstractRepository {
  protected $model = Pagamento::class;
  protected $cobrancaModel = Cobranca::class;
  protected $mensalidadeModel = Mensalidade::class;
  protected $object;
  public function __construct(Pagamento $model)
  {
    $this->model = $model;
  }
  public function store() {
    return $this->storeWithFresh();
  }
  private function getObject() {
    switch (request()->get('tipo')) {
      case 'mensalidade':
        return $this->mensalidadeModel::findOrFail(request()->get('id_referencia'));
        break;
      case 'cobranca':
        return $this->cobrancaModel::findOrFail(request()->get('id_referencia'));
        break;
    }
  }

  private function storeWithFresh() {
    $this->object = $this->getObject();
    if($this->checkValue($this->object->valorRestante)) {
      $payment = $this->model::create(request()->except('_token'));
      $this->updateStatus($this->object->fresh());
      return $payment;
    }
    return null;
  }
  private function checkValue($value) {
    if(request()->get('valor') > 0 && request()->get('valor') <= $value) {
      return true;
    }
    return false;
  }
  private function updateStatus($object) {
    if($object->valorRestante <= 0) {
      $object->status = "pago";
    } else {
      $object->status = "parcial";
    }
    $object->save();
  }
  public function delete($id) {
    $pagamento = $this->model::findOrFail($id);
    $pagamento->delete();
    $this->updateStatus($this->getObject()->findOrFail($pagamento->id_referencia));
    return true;
  }
}
?>