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
            'id_inventaris'=>1,
           'tanggal_peminjaman'=>'21-03-03',
           'jumlah_pinjaman'=>20,
           'tanggal_kembali'=>'21-04-03',
           'tanggal_dikembalikan'=>NULL,
           'status_peminjaman'=>'pending',
           'approval'=>1,
            'id_peminjam'=>1
        ]);
    }
}
