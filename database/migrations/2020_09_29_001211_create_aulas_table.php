<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_aluno')->constrained('alunos');
            $table->foreignId('id_professor')->constrained('professores');
            $table->foreignId('id_matricula')->constrained('matriculas');
            $table->date('data');
            $table->text('descricao');
            $table->enum('tipo',['padrao', 'recuperacao']);
            $table->enum('status',['realizada', 'remarcar']);
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
        Schema::dropIfExists('aulas');
    }
}
