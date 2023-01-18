<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mapel::factory(10)->create()->each(function($mapel) {
            $mapel->guru()->create([
                'departemen_id' => $mapel->tingkat->departemen->id,
                'tingkat_id' => $mapel->tingkat->id,
                'mapel_id' => $mapel->id,
                'nip' => fake()->randomNumber(5, true),
                'nuptk' => fake()->randomNumber(5, true),
                'nama' => fake()->name(),
                'email' => fake()->safeEmail(),
                'telepon' => fake()->phoneNumber(),
                'password' => bcrypt('secret'),
                'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                'foto' => fake()->imageUrl(),
                'alamat' => fake()->address(),
                'tempat_lahir' => fake()->streetAddress(),
                'tanggal_lahir' => fake()->date(),
            ]);
        });
    }
}
