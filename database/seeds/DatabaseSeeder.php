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
        $this->call(PeminjamSeed::class);
        $this->call(Peminjaman::class);
        $this->call(Jenis::class);
        $this->call(Ruangan::class);
        $this->call(Level::class);
        $this->call(Petugas::class);
        $this->call(Inventaris::class);
        $this->call(DetailPinjaman::class);
        $this->call(LogActivities::class);
    }
}
