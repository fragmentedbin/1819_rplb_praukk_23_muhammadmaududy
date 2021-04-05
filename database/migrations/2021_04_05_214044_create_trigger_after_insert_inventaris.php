<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerAfterInsertInventaris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER after_insert_inventaris AFTER INSERT ON `inventaris` FOR EACH ROW
            BEGIN
                INSERT INTO log (`id_user`, `activities`, `created_at`) 
                VALUES (NEW.id_user, "insert inventaris", now());
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
        Schema::dropIfExists('after_insert_inventaris');
    }
}
