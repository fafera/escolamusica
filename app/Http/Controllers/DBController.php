<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBController extends Controller
{
    public function limparSalarios() {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      DB::table('informe_professores')->truncate();
      DB::table('informe_escola')->truncate();
      DB::table('informe_professores')->truncate();
      DB::table('salarios')->truncate();
      DB::table('controles_salarios')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
