<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetailPinjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_pinjaman', function (Blueprint $table) {
            $table->foreign('id_inventaris', 'detail_pinjaman_ibfk_1')->references('id_inventaris')->on('inventaris')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_peminjaman', 'detail_pinjaman_ibfk_2')->references('id_peminjaman')->on('peminjaman')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_pinjaman', function (Blueprint $table) {
            $table->dropForeign('detail_pinjaman_ibfk_1');
            $table->dropForeign('detail_pinjaman_ibfk_2');
        });
    }
}
