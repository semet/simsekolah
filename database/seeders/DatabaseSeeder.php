<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Departemen;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Tingkat;
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
        $this->call([
            AdminSeeder::class,
            DepartemenSeeder::class,
            PegawaiSeeder::class
        ]);
    }
}
