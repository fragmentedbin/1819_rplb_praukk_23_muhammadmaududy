<?php

use Illuminate\Database\Seeder;

class Level extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("level")->insert([
            'nama_level'=>'admin'
        ]);
        DB::table("level")->insert([
            'nama_level'=>'petugas'
        ]);
        DB::table("level")->insert([
            'nama_level'=>'pengunjung'
        ]);
    }
}
