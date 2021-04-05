<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->foreign('id_peminjam', 'peminjaman_ibfk_1')->references('id_peminjam')->on('peminjam')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_inventaris', 'peminjaman_ibfk_2')->references('id_inventaris')->on('inventaris')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropForeign('peminjaman_ibfk_1');
            $table->dropForeign('peminjaman_ibfk_2');
        });
    }
}
