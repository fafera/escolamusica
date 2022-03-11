<?php

namespace App\Models;

use App\Helpers\DateHelper;
use App\Helpers\FinancialHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = ['valor', 'tipo', 'id_referencia', 'data'];
    use HasFactory;
    public function setDataAttribute($data) {
        $this->attributes['data'] = DateHelper::formatBRDateToSqlDate($data);
    }
    public function setValorAttribute($valor) {
        $this->attributes['valor'] = FinancialHelper::formatBRLtoDecimal($valor);
    }
    public function getDataBRAttribute() {
        $carbon = Carbon::parse($this->data);
        return $carbon->format('d/m/Y');
    }
    public function getValorBRAttribute() {
      return FinancialHelper::formatToBRL($this->valor);
  }
    public function mensalidade() {
      return $this->belongsTo('App\Models\Mensalidade', 'id_referencia');
    }
    public function cobranca() {
      return $this->belongsTo('App\Models\Cobranca', 'id_referencia');
    }
}
