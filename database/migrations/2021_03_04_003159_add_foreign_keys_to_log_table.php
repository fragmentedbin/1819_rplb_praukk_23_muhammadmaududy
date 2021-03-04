<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log', function (Blueprint $table) {
            $table->foreign('id_level', 'log_ibfk_1')->references('id_level')->on('level')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_petugas', 'log_ibfk_2')->references('id_petugas')->on('petugas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log', function (Blueprint $table) {
            $table->dropForeign('log_ibfk_1');
            $table->dropForeign('log_ibfk_2');
        });
    }
}
