<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableMensalidadesAddDescontoColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensalidades', function (Blueprint $table) {
            $table->foreignId('id_desconto')->nullable()->default(null)->constrained('descontos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mensalidades', function (Blueprint $table) {    
            $table->dropForeign(['id_desconto']);
            $table->dropColumn('id_desconto');
        });
    }
}
