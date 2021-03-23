<?php

use Illuminate\Database\Seeder;

class Jenis extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis')->insert([
            'nama_jenis'=>'Electrical',
            'kode_jenis'=>1,
            'keterangan'=>'barang electric'
        ]);
        DB::table('jenis')->insert([
            'nama_jenis'=>'Chemical',
            'kode_jenis'=>2,
            'keterangan'=>'barang Kimia'
        ]);
    }
}
