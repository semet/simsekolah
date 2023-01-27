<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => 'Hamdani Ash-Sidiq',
            'email' => 'hamdanilombok@gmail.com',
            'telepon' => '+6287736690307',
            'password' => bcrypt('123'),
        ];
    }
}
