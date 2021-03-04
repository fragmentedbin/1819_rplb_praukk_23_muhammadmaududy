<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('petugas', function (Blueprint $table) {
            $table->foreign('id_level', 'petugas_ibfk_1')->references('id_level')->on('level')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('petugas', function (Blueprint $table) {
            $table->dropForeign('petugas_ibfk_1');
        });
    }
}
