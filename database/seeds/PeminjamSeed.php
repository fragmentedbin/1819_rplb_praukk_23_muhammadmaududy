<?php

use Illuminate\Database\Seeder;

class PeminjamSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peminjam')->insert([
            'nama_peminjam'=> 'lara',
            'nip'=>181910309,
            'alamat'=>'jl.bebek'
        ]);
    }
}
