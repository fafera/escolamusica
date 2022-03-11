<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$cursos = [
    		['titulo' => 'Violão', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    		['titulo' => 'Guitarra', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    		['titulo' => 'Baixo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    		['titulo' => 'Bateria', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    		['titulo' => 'Teclado', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    		['titulo' => 'Musicalização', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
    	];
    	DB::table('cursos')->insert($cursos);
    }
}
