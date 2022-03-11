<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiberacaoMatriculaProfessor extends Model
{
    protected $table = 'liberacao_matricula_professor';
    protected $fillable = ['id_professor', 'id_matricula'];
    use HasFactory;

    public function matricula() {
        return $this->belongsTo('App\Models\Matricula', 'id_matricula');

    }
    public function professor() {
        return $this->belongsTo('App\Models\Professor', 'id_professor');
    }

}
