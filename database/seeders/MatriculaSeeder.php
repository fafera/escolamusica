<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Modalidade;
use App\Models\Professor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alunos = Aluno::all();
        $matriculas = [];
        foreach ($alunos as $aluno) {
          $matriculas[] = [
            'id_curso' => Curso::all()->random()->id,
            'id_professor' => Professor::all()->random()->id,
            'id_modalidade' => Modalidade::all()->random()->id,
            'id_aluno' => $aluno->id,
            'dia_da_semana' => rand(1,5),
            'horario' => Carbon::createFromTime(rand(9,18), 0, 0)
          ];

        }
        DB::table('matriculas')->insert($matriculas);
    }
}
