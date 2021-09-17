<?php

namespace App\Models;

use App\Helpers\DateHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matricula extends Model
{
    protected $fillable = ['id_aluno', 'id_curso', 'id_modalidade', 'id_professor', 'dia_da_semana', 'horario', 'porcentagem_professor'];
    use HasFactory, SoftDeletes;
    public function setHorarioAttribute($horario) {
        $this->attributes['horario'] = DateHelper::formatBRTimeToTimestamp($horario);
    }
    public function getPorcentagemProfessorAttribute() {
        return (float) $this->attributes['porcentagem_professor'];
    }
    public function getHorarioBRAttribute() {
        return DateHelper::formatTimestampToBRTime($this->horario);
    }
    public function getDiaDaSemanaAttribute($value){
        return DateHelper::getWeekDay($value);
    }
    public function getDiaDaSemanaNumeroAttribute(){
        return DateHelper::switchWeekDay($this->dia_da_semana);
    }
    public function scopeAtivas($query)
    {
        return $query->where('status', 'ativa')->get();
    }
    public function professor() {
        return $this->belongsTo('App\Models\Professor', 'id_professor');
    }
    public function aluno() {
        return $this->belongsTo('App\Models\Aluno', 'id_aluno');
    }
    public function modalidade() {
        return $this->belongsTo('App\Models\Modalidade', 'id_modalidade');
    }
    public function curso() {
        return $this->belongsTo('App\Models\Curso', 'id_curso');
    }
    public function aulas() {
        return $this->hasMany('App\Models\Aula', 'id_matricula');
    }
    public function mensalidades() {
        return $this->hasMany('App\Models\Mensalidade', 'id_matricula');
    }
    public function desconto() {
        return $this->hasOne('App\Models\Desconto', 'id_matricula');
    }
}
