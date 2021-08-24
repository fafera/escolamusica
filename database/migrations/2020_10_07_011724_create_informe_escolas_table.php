<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformeEscolasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_escola', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_aula')->nullable()->constrained('aulas_teste');
            $table->foreignId('id_mensalidade')->nullable()->constrained('mensalidades');
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
        Schema::dropIfExists('informe_escola');
    }
}
