<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->integer('id_inventaris', true);
            $table->integer('kode_inventaris');
            $table->string('nama_inventaris', 100);
            $table->string('keterangan_inventaris', 100);
            $table->date('tanggal_register_inventaris');
            $table->integer('jumlah_inventaris');
            $table->integer('id_jenis')->index('id_jenis');
            $table->integer('id_ruang')->index('id_ruang');
            $table->integer('id_petugas')->index('id_petugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaris');
    }
}
