<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerAfterInsertPinjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER after_insert_peminjaman AFTER INSERT ON `peminjaman` FOR EACH ROW
            BEGIN
                INSERT INTO log (`id_user`, `activities`, `created_at`) 
                VALUES (NEW.id_peminjam, "insert peminjaman", now());
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger_after_insert_pinjaman');
    }
}
