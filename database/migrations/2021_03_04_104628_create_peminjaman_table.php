<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->integer('id_peminjaman', true);
            $table->integer('id_inventaris');
            $table->integer('jumlah_pinjaman');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_kembali');
            $table->string('status_peminjaman', 50);
            $table->tinyInteger('approval');
            $table->integer('id_peminjam')->index('id_peminjam');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
