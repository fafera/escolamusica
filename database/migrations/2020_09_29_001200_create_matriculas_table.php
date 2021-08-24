<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_aluno')->constrained('alunos');
            $table->foreignId('id_curso')->constrained('cursos');
            $table->foreignId('id_modalidade')->constrained('modalidades');
            $table->foreignId('id_professor')->constrained('professores');
            $table->integer('dia_da_semana');
            $table->time('horario');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
