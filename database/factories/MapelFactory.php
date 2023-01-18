<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mapel>
 */
class MapelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'departemen_id' => '983e2fbc-4faa-4044-b496-5d34fa134886',
            'tingkat_id' => '983e31af-b9ca-47cc-8524-6f99de3dca25',
            'kode' => fake()->randomNumber(5, true),
            'nama' => fake()->words(3, true),
            'durasi' => 6
        ];
    }
}
