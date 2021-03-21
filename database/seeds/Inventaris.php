<?php

use Illuminate\Database\Seeder;

class Inventaris extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('inventaris')->insert([
           'nama_inventaris'=>'PCB',
           'keterangan_inventaris'=>'baik',
           'jumlah_inventaris'=>20,
           'id_jenis'=>1,
           'tanggal_register_inventaris'=>date('Y-m-d'),
           'id_ruang'=>1,
           'kode_inventaris'=>"INV/1/".date("ymd").date("his")."/1/1",
           'id_user'=>1
        ]);
    }
}
