<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desconto extends Model
{
    protected $fillable = ['id_matricula', 'motivo', 'valor'];
    use HasFactory;
}
