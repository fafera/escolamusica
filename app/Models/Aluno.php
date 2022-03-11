<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Aluno extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'alunos';
    protected $fillable = ['nome','email', 'rg', 'cpf', 'sexo', 'telefone', 'dt_nascimento', 'status', 'endereco'];
    public function getDtNascimentoAttribute($data) {
        $carbon = Carbon::parse($data);
        return $carbon->format('d/m/Y');
    }
    public function setDtNascimentoAttribute($data) {
        $data = str_replace('/', '-', $data);
        $carbon = Carbon::parse($data);
        $this->attributes['dt_nascimento'] = $carbon->format('Y-m-d');
    }
    public function scopeAtivos($query, $mes, $ano) {
        return $query->select('alunos.*')->join('mensalidades', 'mensalidades.id_matricula', '=', 'matriculas.id')->where('mensalidades.mes', $mes)->where('mensalidades.ano', $ano)->get();
    }
    public function matriculaFromProfessor($professor) {
        return $this->matriculas()->where('id_professor', $professor)->first();
    }
    public function aulas() {
        return $this->hasMany('App\Models\Aula', 'id_aluno');
    }
    public function aulasTeste() {
        return $this->hasMany('App\Models\AulaTeste', 'id_aluno');
    }
    public function matriculas() {
        return $this->hasMany('App\Models\Matricula', 'id_aluno');
    }
    public function mensalidades() {
        return $this->hasManyThrough('App\Models\Mensalidade', 'App\Models\Matricula', 'id_aluno', 'id_matricula');
    }
    public function cobrancas() {
        return $this->hasManyThrough('App\Models\Cobranca', 'App\Models\Matricula', 'id_aluno', 'id_matricula');
    }
}
