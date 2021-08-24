<?php

namespace Database\Seeders;

use App\Models\Matricula;
use App\Models\Modalidade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MensalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matriculas = Matricula::all();
        $mensalidades = [];
        foreach ($matriculas as $matricula) {
          $mensalidades[] = [
            'id_matricula' => $matricula->id,
            'qtd_aulas_previstas' => 4,
            'valor' => Modalidade::find($matricula->id_modalidade)->valor,
            'mes' => 3,
            'ano' => 2021,
            'status' => 'aguardando',
            'vencimento' => '2021-03-20',
          ];

        }
        DB::table('mensalidades')->insert($mensalidades);
    }
}
