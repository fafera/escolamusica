<?php

namespace Database\Seeders;

use App\Models\Matricula;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CobrancaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matriculas = Matricula::all();
        $cobrancas = [];
        foreach ($matriculas as $matricula) {
          $cobrancas[] = [
            'id_matricula' => $matricula->id,
            'qtd_aulas_previstas' => 4,
            'valor' => $matricula->modalidade->valor,
            'mes' => '11',
            'ano' => '2020',
            'status' => 'aguardando',
            'vencimento' => Carbon::now()
          ];
        }
        DB::table('cobrancas')->insert($cobrancas);
    }
}
