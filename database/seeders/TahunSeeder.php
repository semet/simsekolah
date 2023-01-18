<?php

namespace Database\Seeders;

use App\Models\Tahun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tahun::createMany([
            [
                'nama' => '2021/2022',
                'awal' => '2021-07-01',
                'akhir' => '2022-06-30',
                'aktif' => 0
            ],
            [
                'nama' => '2022/2023',
                'awal' => '2022-07-01',
                'akhir' => '2023-06-30',
                'aktif' => 0
            ]
        ])
        ->each(function($tahun) {
            $tahun->semester()->createMany([
                [
                    'nama' => 'Ganjil',
                    'awal' => '2021-07-01',
                    'akhir' => '2022-06-30',
                ]
            ]);
        });
    }
}
