<?php

namespace App\Models;

use App\Helpers\DateHelper;
use App\Helpers\FinancialHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model
{
    protected $fillable = ['id_matricula', 'qtd_aulas_previstas', 'id_desconto', 'status', 'vencimento', 'mes', 'ano', 'valor'];
    use HasFactory;

    public function setVencimentoAttribute($vencimento) {
      $this->attributes['vencimento'] = DateHelper::formatBRDateToSqlDate($vencimento);
    }
    public function setValorAttribute($valor) {
      $this->attributes['valor'] = FinancialHelper::formatBRLtoDecimal($valor);
    }
    public function getVencimentoDataBRAttribute() {
      return DateHelper::formatSQLDateToBRDate($this->vencimento);
    }
    public function getValorFormatadoAttribute() {
      return FinancialHelper::formatToBRL($this->valor);
    }
    public function getStatusFormatadoAttribute() {
      return ucfirst($this->status);
    }
    public function matricula() {
      return $this->belongsTo('App\Models\Matricula', 'id_matricula')->withTrashed();
    }
    public function informesProfessor() {
      return $this->hasMany('App\Models\InformeProfessor', 'id_mensalidade');
    }
    public function informeEscola() {
      return $this->hasOne('App\Models\InformeEscola', 'id_mensalidade', 'id');
    }
    public function aulas() {
      return $this->hasManyThrough('App\Models\Aula', 'App\Models\Matricula', 'id', 'id_matricula');
    }
    public function pagamentos() {
      return $this->hasMany('App\Models\Pagamento', 'id_referencia')->where('tipo', 'mensalidade');
    }
    public function getValorRestanteAttribute() {
      return number_format($this->valor - $this->pagamentos->sum('valor'), 2);
    }
}
