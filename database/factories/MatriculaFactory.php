<?php

namespace Database\Factories;

use App\Models\Matricula;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatriculaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Matricula::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_aluno' =>,
            'id_curso' =>,
            'id_modalidade' =>,
            'id_professor' =>,
            'dia_da_semana' =>,
            'horario' =>
        ];
    }
}
