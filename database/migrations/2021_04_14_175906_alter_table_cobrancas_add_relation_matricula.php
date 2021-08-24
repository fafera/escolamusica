<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCobrancasAddRelationMatricula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cobrancas', function (Blueprint $table) {
            $table->foreignId('id_matricula')->nullable()->constrained('matriculas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cobrancas', function (Blueprint $table) {
            $table->dropForeign(['cobrancas_id_matricula_foreign']);
            $table->dropColumn('id_matricula');
        });
    }
}
