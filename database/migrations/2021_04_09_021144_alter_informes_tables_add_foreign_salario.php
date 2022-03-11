<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInformesTablesAddForeignSalario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informe_professores', function (Blueprint $table) {
            $table->foreignId('id_salario')->constrained('salarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informe_professores', function (Blueprint $table) {
            $table->dropColumn('id_salario');
        });
    }
}
