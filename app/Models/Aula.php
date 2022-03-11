<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aula extends Model
{
    use HasFactory;
    protected $fillable = ['id_aluno', 'id_professor', 'id_matricula', 'data', 'descricao', 'tipo', 'status'];
    public function setDataAttribute($data) {
        $data = str_replace('/', '-', $data);
        $carbon = Carbon::parse($data);
        $this->attributes['data'] = $carbon->format('Y-m-d');
    }
    public function getDataBRAttribute() {
        $carbon = Carbon::parse($this->data);
        return $carbon->format('d/m/Y');
    }
    public function getTipoFormatadoAttribute($tipo) {
        if($tipo == 'padrao')
            return "Padrão";
        return ucfirst($tipo);
    }
    public function getStatusFormatadoAttribute() {
        return ucfirst($this->status);
    }
    public function scopeDoMes($query, $mes, $ano) {
        $data = Carbon::createFromDate($ano, $mes, $this->getDefaultDay());
        return $query->whereBetween('aulas.data',[$data->firstOfMonth()->format('Y-m-d'), $data->lastOfMonth()->format('Y-m-d')])->get();
        //return $query->select('aulas.*')->join('matriculas','matriculas.id_aluno','=','aulas.id_aluno')->whereBetween('aulas.data',[$data->firstOfMonth()->format('Y-m-d'), $data->lastOfMonth()->format('Y-m-d')])->get();
    }
    private function getDefaultDay() {
        return 1;
    }
    public function aluno() {
        return $this->belongsTo('App\Models\Aluno', 'id_aluno');
    }
    public function professor() {
        return $this->belongsTo('App\Models\Professor', 'id_professor');
    }
    public function matricula() {
        return $this->belongsTo('App\Models\Matricula', 'id_matricula');
    }
}
