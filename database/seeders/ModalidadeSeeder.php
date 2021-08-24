<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ModalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modalidades = [
    		['duracao' => Carbon::createFromTime(1,0,0), 'valor' => '210','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    		['duracao' => Carbon::createFromTime(0,50,0), 'valor' => '205','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    		['duracao' => Carbon::createFromTime(0,45,0), 'valor' => '200','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
    		['duracao' => Carbon::createFromTime(0,30,0), 'valor' => '182','created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
    	];
    	DB::table('modalidades')->insert($modalidades);
    }
}
