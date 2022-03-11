<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfessor extends Model
{
    use HasFactory;
    protected $table = 'user_professor';
    protected $fillable = ['id_user', 'id_professor'];
}
