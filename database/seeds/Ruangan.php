<?php

use Illuminate\Database\Seeder;

class Ruangan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ruangan')->insert([
            'nama_ruangan'=>'rpl',
            'kode_ruangan'=> "RNG/1/".date("ymd").date("his")."/1",
            'keterangan_ruangan'=>'lab rpl 1'
        ]);
        DB::table('ruangan')->insert([
            'nama_ruangan'=>'multimedia',
            'kode_ruangan'=>"RNG/2/".date("ymd").date("his")."/1",
            'keterangan_ruangan'=>'lab multimedia 2'
        ]);
    }
}
