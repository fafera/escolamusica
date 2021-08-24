<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $professores = [
          ['nome' => 'Raphael Capellari', 'porcentagem' => '70','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['nome' => 'Mateus Brites', 'porcentagem' => '70','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['nome' => 'Diuran Matani', 'porcentagem' => '60','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
      DB::table('professores')->insert($professores);
    }
}
