<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAlunosAddDefaultStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alunos', function (Blueprint $table) {
            DB::statement("ALTER TABLE alunos MODIFY COLUMN status ENUM('ativo', 'escondido') NOT NULL DEFAULT 'ativo'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alunos', function (Blueprint $table) {
            DB::statement("ALTER TABLE alunos MODIFY COLUMN status ENUM('ativo', 'escondido') NULL DEFAULT null");
        });
        
    }
}
