<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformeEscola extends Model
{
    use HasFactory;
    protected $table = 'informe_escola';
    protected $fillable = ['id_aula', 'id_mensalidade',  'valor'];

    public function salario() {
      return $this->belongsTo('App\Models\Salario', 'id_salario', 'id');
    }
    public function informeProfessor() {
      return $this->belongsTo('App\Models\InformeProfessor', 'id_informe_professor');
    }
}
