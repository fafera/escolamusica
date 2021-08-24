<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableMensalidadeAddDefaultStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mensalidades', function (Blueprint $table) {
            DB::statement("ALTER TABLE mensalidades MODIFY COLUMN status ENUM('pago', 'aguardando') NOT NULL DEFAULT 'aguardando'");
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
            DB::statement("ALTER TABLE mensalidades MODIFY COLUMN status ENUM('pago', 'aguardando') NOT NULL");
        });
    }
}
