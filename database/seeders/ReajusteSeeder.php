<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReajusteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reajuste = ['valor' => 5, 'ano' => '2020'];
        DB::table('reajuste')->insert($reajuste);
    }
}
