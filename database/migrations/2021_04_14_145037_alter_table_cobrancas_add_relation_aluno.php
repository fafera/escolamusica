<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCobrancasAddRelationAluno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cobrancas', function (Blueprint $table) {
            $table->foreignId('id_aluno')->constrained('alunos');
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
            $table->dropForeign(['id_aluno']);
            $table->dropColumn('id_aluno');
        });
    }
}
