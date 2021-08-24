<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAulasSetDefaultTipoStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aulas', function (Blueprint $table) {
            DB::statement("ALTER TABLE aulas MODIFY COLUMN tipo ENUM('padrao', 'teste', 'recuperacao') NOT NULL DEFAULT 'padrao'");
            DB::statement("ALTER TABLE aulas MODIFY COLUMN status ENUM('realizada', 'adiada') NOT NULL DEFAULT 'realizada'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aulas', function (Blueprint $table) {
            DB::statement("ALTER TABLE aulas MODIFY COLUMN tipo ENUM('padrao', 'teste', 'recuperacao') NULL DEFAULT null");
            DB::statement("ALTER TABLE aulas MODIFY COLUMN status ENUM('realizada', 'adiada') NULL DEFAULT null");
        });
        
    }
}
