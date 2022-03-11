<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformeProfessoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_professores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_professor')->constrained('professores');
            //Importante deixar nullable pra inseriraulas extra sem matricula
            $table->foreignId('id_mensalidade')->nullable()->constrained('mensalidades');
            $table->integer('qtd_aulas_realizadas');
            $table->decimal('valor', 8, 2);
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
        Schema::dropIfExists('informe_professores');
    }
}
