<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = ['titulo'];
    public function matriculas() {
    	return $this->hasMany('App\Models\Matricula', 'id_curso');
    }
}
