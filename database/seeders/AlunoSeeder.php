<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;


class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aluno::factory(5)
            ->create();
    }
}
