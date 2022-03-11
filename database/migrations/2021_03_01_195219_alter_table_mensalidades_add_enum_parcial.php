<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableMensalidadesAddEnumParcial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensalidades', function (Blueprint $table) {
            DB::statement("ALTER TABLE mensalidades MODIFY COLUMN status ENUM('aguardando','pago', 'parcial') NOT NULL DEFAULT 'aguardando'");
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
            DB::statement("ALTER TABLE mensalidades MODIFY COLUMN status ENUM('aguardando', 'pago') NOT NULL DEFAULT 'aguardando'");
        });
    }
}
