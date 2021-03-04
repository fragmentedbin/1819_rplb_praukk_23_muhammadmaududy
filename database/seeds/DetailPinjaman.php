<?php

use Illuminate\Database\Seeder;

class DetailPinjaman extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_pinjaman')->insert([
            'id_inventaris'=>1,
            'jumlah_pinjaman'=>100,
            'id_peminjaman'=>1
        ]);
    }
}
