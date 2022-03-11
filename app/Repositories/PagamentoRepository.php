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
    return $this->storeWithValueUpdate();
  }
  public function all() {
    return $this->model->all()->map(function ($pgto) {
      if($pgto->tipo == 'mensalidade') {
        $pgto->aluno = $pgto->mensalidade->matricula->aluno->nome; 
      } else { 
        $pgto->aluno = $pgto->cobranca->matricula->aluno->nome;
      }
      return $pgto;
    });
  }
  public function redirectPaymenteToBillType($id) {
    $payment = $this->model->findOrFail($id);
    if($payment->tipo == 'mensalidade') {
      return redirect()->route('mensalidades.show', $payment->id_referencia);
    }
    return redirect()->route('cobrancas.show', $payment->id_referencia);
  }
  private function getObject($id = null) {
    $id != null ? $id = $id : $id = request()->get('id_referencia');
    switch (request()->get('tipo')) {
      case 'mensalidade':
        return $this->mensalidadeModel::findOrFail($id);
        break;
      case 'cobranca':
        return $this->cobrancaModel::findOrFail($id);
        break;
    }
  }
  private function checkReferenceRequest() {

  }
  private function storeWithValueUpdate() {
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
    $this->updateDeletedStatus($pagamento, $this->getObject($pagamento->id_referencia));
    $pagamento->delete();
    
    return true;
  }
  private function updateDeletedStatus($payment, $bill) {
    if(($bill->valor - $payment->valor) <= 0) {
      $bill->status = "aguardando";
    } else {
      $bill->status = "parcial";
    }
    return $bill->save();
  }
}
?>