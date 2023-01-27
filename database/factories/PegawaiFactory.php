<?php

namespace Database\Factories;

use App\Models\Departemen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'departemen_id' => Departemen::first()->id,
            'nip' => fake()->randomNumber(5, true),
            'nuptk' => fake()->randomNumber(5, true),
            'nama' => fake()->name(),
            'email' => fake()->safeEmail(),
            'telepon' => fake()->phoneNumber(),
            'password' => bcrypt('secret'),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'jabatan' => fake()->randomElement(['TU', 'BK', 'Operator']),
            'foto' => fake()->imageUrl(),
            'alamat' => fake()->address(),
            'tempat_lahir' => fake()->streetAddress(),
            'tanggal_lahir' => fake()->date(),
        ];
    }
}
