<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiberacaoMatriculaProfessorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liberacao_matricula_professor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_matricula')->constrained('matriculas');
            $table->foreignId('id_professor')->constrained('professores');
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
        Schema::dropIfExists('liberacao_matricula_professor');
    }
}
