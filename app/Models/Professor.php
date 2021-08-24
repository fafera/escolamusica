<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Professor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'professores';
    protected $fillable = ['nome', 'porcentagem'];
    public function matriculas() {
        return $this->hasMany('App\Models\Matricula', 'id_professor');
    }
    public function informes() {
        return $this->hasMany('App\Models\InformeProfessor', 'id_professor');
    }
    public function alunos() {
        return $this->hasManyThrough('App\Models\Aluno', 'App\Models\Matricula', 'id_professor', 'id', 'id', 'id_aluno')->orderBy('nome');
    }
    public function aulas() {
        return $this->hasMany('App\Models\Aula', 'id_professor');
    }
    public function matriculasLiberadas(){
        return $this->hasMany('App\Models\LiberacaoMatriculaProfessor', 'id_professor');
    }
    public function aulasTeste() {
        return $this->hasMany('App\Models\AulaTeste', 'id_professor');
    }
    public function salarios() {
        return $this->hasMany('App\Models\Salario', 'id_professor');
    }
}