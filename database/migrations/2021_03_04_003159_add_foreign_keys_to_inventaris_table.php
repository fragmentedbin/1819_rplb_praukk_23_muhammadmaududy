<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventaris', function (Blueprint $table) {
            $table->foreign('id_jenis', 'inventaris_ibfk_1')->references('id_jenis')->on('jenis')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_ruang', 'inventaris_ibfk_2')->references('id_ruangan')->on('ruangan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_petugas', 'inventaris_ibfk_3')->references('id_petugas')->on('petugas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventaris', function (Blueprint $table) {
            $table->dropForeign('inventaris_ibfk_1');
            $table->dropForeign('inventaris_ibfk_2');
            $table->dropForeign('inventaris_ibfk_3');
        });
    }
}
