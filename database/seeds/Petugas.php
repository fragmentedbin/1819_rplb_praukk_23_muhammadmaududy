<?php

use Illuminate\Database\Seeder;

class Petugas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petugas')->insert([
            'username_petugas'=>'aheng',
            'password_petugas'=> Hash::make('aheng'),
            'nama_petugas'=>'ahehong',
            'id_level'=>1
            ]);
        DB::table('petugas')->insert([
            'username_petugas'=>'rara',
            'password_petugas'=> Hash::make('rara'),
            'nama_petugas'=>'raraja',
            'id_level'=>2
            ]);
        DB::table('petugas')->insert([
            'username_petugas'=>'joe',
            'password_petugas'=> Hash::make('joe'),
            'nama_petugas'=>'joce',
            'id_level'=>3
            ]);
    }
}