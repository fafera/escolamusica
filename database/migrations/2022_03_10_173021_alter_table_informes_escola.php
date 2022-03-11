<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableInformesEscola extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informe_escola', function (Blueprint $table) {
            $table->foreignId('id_informe_professor')->constrained('informe_professores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informe_escola', function (Blueprint $table) {
            $table->dropForeign('informe_escola_id_informe_professor_foreign');
            $table->dropColumn('id_informe_professor');
        });
    }
}
