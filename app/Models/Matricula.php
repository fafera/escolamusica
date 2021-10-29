<?php

namespace App\Models;

use Carbon\Carbon;
use App\Helpers\DateHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matricula extends Model
{
    protected $fillable = ['id_aluno', 'id_curso', 'id_modalidade', 'id_professor', 'dia_da_semana', 'horario', 'porcentagem_professor'];
    /* protected $attributes = ['horario_final']; */
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
    public function getHorarioFinalAttribute() {
        $modalidade = Modalidade::find($this->id_modalidade);
        $duracao = Carbon::parse($modalidade->duracao);
        return Carbon::parse($this->horario)->addHours($duracao->hour)->addMinutes($duracao->minute);
    }
    public function getDiaDaSemanaAttribute($value){
        return DateHelper::getWeekDay($value);
    }
    public function getDiaDaSemanaNumeroAttribute(){
        return DateHelper::switchWeekDay($this->dia_da_semana);
    }
    public function scopeAtivas($query)
    {
        return $query->join('alunos','alunos.id','matriculas.id_aluno')->where('matriculas.status', 'ativa')->orderBy('alunos.nome')->get('matriculas.*');
    }
    public function scopeOrderByAlunoNome($query, $direction = 'desc')
    {
        return $query->orderBy(Aluno::select('*')
            ->whereColumn('matriculas.id_aluno', 'alunos.id')
            ->latest(),
            $direction
        );
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
