<?php

namespace App\Models;

use Carbon\Carbon;
use App\Helpers\DateHelper;
use App\Helpers\FinancialHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AulaTeste extends Model
{
    use HasFactory;
    protected $fillable = ['id_aluno', 'id_professor', 'horario', 'data', 'descricao', 'tipo', 'status', 'id_mensalidade', 'valor', 'porcentagem_professor', 'id_modalidade'], $table = 'aulas_teste';
    public function setHorarioAttribute($horario) {
        $this->attributes['horario'] = DateHelper::formatBRTimeToTimestamp($horario);
    }
    public function setDataAttribute($data) {
        $this->attributes['data'] = DateHelper::formatBRDateToSqlDate($data);
    }
    public function setValorAttribute($valor) {
        $this->attributes['valor'] = FinancialHelper::formatBRLtoDecimal($valor);
      }
    public function getPorcentagemProfessorAttribute() {
        return (float) $this->attributes['porcentagem_professor'];
    }
    public function getDataBRAttribute() {
        $carbon = Carbon::parse($this->data);
        return $carbon->format('d/m/Y');
    }
    public function getHorarioBRAttribute() {
        return DateHelper::formatTimestampToBRTime($this->horario);
    }
    public function getTipoFormatadoAttribute($tipo) {
        return ucfirst($tipo);
    }
    public function getStatusFormatadoAttribute() {
        return ucfirst($this->status);
    }
    public function scopeDoMes($query, $mes, $ano) {
        $data = Carbon::createFromDate($ano, $mes, $this->getDefaultDay());
        return $query->whereBetween('aulas_teste.data',[$data->firstOfMonth()->format('Y-m-d'), $data->lastOfMonth()->format('Y-m-d')])->get();
    }
    private function getDefaultDay() {
        return 1;
    }
    public function modalidade() {
        return $this->belongsTo('App\Models\Modalidade', 'id_modalidade');
    }
    public function aluno() {
        return $this->belongsTo('App\Models\Aluno', 'id_aluno');
    }
    public function professor() {
        return $this->belongsTo('App\Models\Professor', 'id_professor');
    }
    public function informeEscola() {
        return $this->hasOne('App\Models\InformeEscola', 'id_aula', 'id');
    }
}
