<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioFuncionamento extends Model
{
    use HasFactory;
    protected $table = 'horarios_funcionamento';
    protected $fillable = ['titulo', 'dia_da_semana', 'horario_inicial', 'horario_final'];
}
