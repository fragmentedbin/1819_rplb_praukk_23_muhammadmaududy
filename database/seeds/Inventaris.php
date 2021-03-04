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
           'tanggal_register_inventaris'=>'21-03-03',
           'id_ruang'=>1,
           'kode_inventaris'=>1,
           'id_petugas'=>1
        ]);
    }
}
