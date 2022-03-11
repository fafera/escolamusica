<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableInformeProfessoresAddIdAulaColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informe_professores', function (Blueprint $table) {
            $table->foreignId('id_aula')->nullable()->constrained('aulas_teste');
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
            $table->dropForeign(['id_aula']);
            $table->dropColumn('id_aula');
        });
    }
}
