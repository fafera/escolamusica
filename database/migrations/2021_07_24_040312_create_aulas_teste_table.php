<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulasTesteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas_teste', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_aluno')->constrained('alunos');
            $table->foreignId('id_professor')->constrained('professores');
            $table->date('data');
            $table->time('horario');
            $table->text('descricao')->nullable();
            $table->enum('tipo',['teste', 'recuperacao']);
            $table->enum('status',['aguardando', 'realizada', 'cancelada'])->default('aguardando');
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
        Schema::dropIfExists('aulas_teste');
    }
}
