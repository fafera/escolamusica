<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $i = 0;
      for($i=1; $i<=6; $i++) {
        $horario['titulo']  = 'Manhã';
        $horario['dia_da_semana'] = $i;
        $horario['horario_inicial'] = "09:00:00";
        $horario['horario_final'] = "12:00:00";
        DB::table('horarios_funcionamento')->insert($horario);
        if($i != 6) {
          $horario['titulo']  = 'Tarde';
          $horario['dia_da_semana'] = $i;
          $horario['horario_inicial'] = "13:30:00";
          $horario['horario_final']= "19:00:00";
          DB::table('horarios_funcionamento')->insert($horario);
        }

      }
    }

}
