<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Jenis::class);
        $this->call(Ruangan::class);
        $this->call(Level::class);
        $this->call(UserSeeder::class);
        $this->call(PeminjamSeed::class);
        $this->call(Inventaris::class);
        $this->call(Peminjaman::class);
        $this->call(DetailPinjaman::class);
        $this->call(LogActivities::class);
    }
}
