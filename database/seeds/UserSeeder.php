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
            'name'=>'aheng',
            'email'=>'muhammadmaududy1@gmail.com',
            'password'=> Hash::make('aheng123456'),
            'id_level'=>1
            // 'nama_user'=>'ahehong',
            ]);
        DB::table('users')->insert([
            'name'=>'rara',
            'email'=>'muhammadmaududy2@gmail.com',
            'password'=> Hash::make('rara123456'),
            'id_level'=>2
            // 'nama_user'=>'raraja',
            ]);
        DB::table('users')->insert([
            'name'=>'joe',
            'email'=>'muhammadmaududy3@gmail.com',
            'password'=> Hash::make('joe123456'),
            'id_level'=>3
            // 'nama_user'=>'joce',
            ]);
    }
}
