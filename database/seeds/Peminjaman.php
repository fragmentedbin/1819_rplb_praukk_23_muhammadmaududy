<?php

use Illuminate\Database\Seeder;

class Peminjaman extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peminjaman')->insert([
           'tanggal_peminjaman'=>'21-03-03',
           'tanggal_kembali'=>'21-04-03',
           'status_peminjaman'=>'pending',
           'approval'=>1,
            'id_peminjam'=>1
        ]);
    }
}
