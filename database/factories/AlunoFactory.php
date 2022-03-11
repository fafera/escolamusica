<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Modalidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aluno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->unique()->phoneNumber,
            'cpf' => $this->faker->cpf,
            'rg' => $this->faker->rg,
            'endereco' => $this->faker->address,
            'dt_nascimento' => $this->faker->date,
            'status' => 'ativo',
            'sexo' => $this->faker->randomElement(array('m', 'f'))
        ];
    }
}
