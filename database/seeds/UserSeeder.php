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
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=> Hash::make('admin123456'),
            'id_level'=>1
            // 'nama_user'=>'ahehong',
            ]);
        DB::table('users')->insert([
            'name'=>'staff',
            'email'=>'staff@gmail.com',
            'password'=> Hash::make('staff123456'),
            'id_level'=>2
            // 'nama_user'=>'raraja',
            ]);
        DB::table('users')->insert([
            'name'=>'pelanggan',
            'email'=>'pelanggan@gmail.com',
            'password'=> Hash::make('pelanggan123456'),
            'id_level'=>3
            // 'nama_user'=>'joce',
            ]);
    }
}
