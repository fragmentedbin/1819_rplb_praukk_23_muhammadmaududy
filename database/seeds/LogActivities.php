<?php

use Illuminate\Database\Seeder;

class LogActivities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('log')->insert([
            'id_user'=>1,
            'id_level'=>1,
            'activities'=>'melakukan login',
            'time'=>date("H:i:s")
        ]);
    }
}
