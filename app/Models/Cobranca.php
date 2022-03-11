<?php

namespace App\Models;

use App\Helpers\DateHelper;
use App\Helpers\FinancialHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobranca extends Model
{
    protected $fillable = ['id_matricula', 'tipo', 'valor', 'id_aluno', 'data'];
    use HasFactory;

    public function setDataAttribute($data) {
      $this->attributes['data'] = DateHelper::formatBRDateToSqlDate($data);
    }
    public function setValorAttribute($valor) {
      $this->attributes['valor'] = FinancialHelper::formatBRLtoDecimal($valor);
    }
    public function getDataBRAttribute() {
      return DateHelper::formatSQLDateToBRDate($this->data);
    }
    public function getValorBRLAttribute() {
      return FinancialHelper::formatToBRL($this->valor);
    }
    public function getTipoFormatadoAttribute() {
      return ucfirst($this->tipo);
    }
    public function matricula() {
        return $this->belongsTo('App\Models\Matricula', 'id_matricula');
    }
    public function aulas() {
        return $this->hasManyThrough('App\Models\Aula', 'App\Models\Matricula', 'id', 'id_matricula');
    }
    public function aluno() {
      return $this->belongsTo('App\Models\Aluno', 'id_aluno');
    }
    public function pagamentos() {
      return $this->hasMany('App\Models\Pagamento', 'id_referencia')->where('tipo', 'cobranca');
    }
    public function getValorRestanteAttribute() {
      return number_format($this->valor - $this->pagamentos->sum('valor'), 2);
    }
}
