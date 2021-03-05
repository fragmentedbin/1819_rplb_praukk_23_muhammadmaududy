<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'username_user'=>'aheng',
            'password_user'=> Hash::make('aheng'),
            'nama_user'=>'ahehong',
            'id_level'=>1
            ]);
        DB::table('user')->insert([
            'username_user'=>'rara',
            'password_user'=> Hash::make('rara'),
            'nama_user'=>'raraja',
            'id_level'=>2
            ]);
        DB::table('user')->insert([
            'username_user'=>'joe',
            'password_user'=> Hash::make('joe'),
            'nama_user'=>'joce',
            'id_level'=>3
            ]);
    }
}
