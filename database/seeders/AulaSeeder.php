<?php

namespace Database\Seeders;

use App\Models\Matricula;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matriculas = Matricula::all();
        $aulas = [];
        foreach ($matriculas as $matricula) {
          for($i=0; $i<4; $i++) {
            $aulas[] = [
              'id_aluno' => $matricula->id_aluno,
              'id_professor' => $matricula->id_professor,
              'id_matricula' => $matricula->id,
              'data' => Carbon::now(),
              'descricao' => 'ok',
              'tipo' => 'padrao',
              'status' => 'realizada'
            ];
          }
        }
        DB::table('aulas')->insert($aulas);
    }
}
