<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPinjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pinjaman', function (Blueprint $table) {
            $table->integer('id_detail_pinjaman', true);
            $table->integer('id_inventaris')->index('id_inventaris');
            $table->integer('jumlah_pinjaman');
            $table->integer('id_peminjaman')->index('id_peminjaman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pinjaman');
    }
}
