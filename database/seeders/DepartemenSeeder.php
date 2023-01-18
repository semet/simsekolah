<?php

namespace Database\Seeders;

use App\Models\Departemen;
use App\Models\Kelas;
use App\Models\Tingkat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departemen::factory()
            ->create()
            ->each(function($departemen) {
                $departemen->tingkat()->createMany(
                    [
                        [
                            'departemen_id' => $departemen->id,
                            'nama' => 'I (Satu)'
                        ],
                        [
                            'departemen_id' => $departemen->id,
                            'nama' => 'II (Dua)'
                        ],
                        [
                            'departemen_id' => $departemen->id,
                            'nama' => 'III (Tiga)'
                        ]
                    ]
                )
                ->each(function($tingkat) {
                    $tingkat->kelas()->createMany(
                        [
                            [
                                'departemen_id' => $tingkat->departemen->id,
                                'tingkat_id' => $tingkat->id,
                                'nama' => 'A',
                                'kapasitas' => 25
                            ],
                            [
                                'departemen_id' => $tingkat->departemen->id,
                                'tingkat_id' => $tingkat->id,
                                'nama' => 'B',
                                'kapasitas' => 25
                            ]
                        ]
                    )
                    ->each(function($kelas) {
                        //siswa
                        $kelas->siswa()->createMany(
                            [
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                                [
                                    'departemen_id' => $kelas->tingkat->departemen->id,
                                    'tingkat_id' => $kelas->tingkat->id,
                                    'kelas_id' => $kelas->id,
                                    'nis' => fake()->randomNumber(5, true),
                                    'nisn' => fake()->randomNumber(6, true),
                                    'nama' => fake()->name(),
                                    'telepon' => fake()->phoneNumber(),
                                    'password' => bcrypt('secret'),
                                    'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                    'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                    'foto' => fake()->imageUrl(),
                                    'alamat' => fake()->address(),
                                    'tempat_lahir' => fake()->streetName(),
                                    'tanggal_lahir' => fake()->date(),
                                ],
                            ]
                        );
                    });
                    //mapel
                    $tingkat->mapel()->createMany(
                        [
                            [
                                'departemen_id' => $tingkat->departemen->id,
                                'tingkat_id' => $tingkat->id,
                                'kode' => fake()->randomNumber(4, true),
                                'nama' => 'Bahasa Indonesia',
                                'durasi' => fake()->randomElement([4, 6])
                            ],
                            [
                                'departemen_id' => $tingkat->departemen->id,
                                'tingkat_id' => $tingkat->id,
                                'kode' => fake()->randomNumber(4, true),
                                'nama' => 'Bahasa Inggris',
                                'durasi' => fake()->randomElement([4, 6])
                            ],
                            [
                                'departemen_id' => $tingkat->departemen->id,
                                'tingkat_id' => $tingkat->id,
                                'kode' => fake()->randomNumber(4, true),
                                'nama' => 'Matematika',
                                'durasi' => fake()->randomElement([4, 6])
                            ],
                            [
                                'departemen_id' => $tingkat->departemen->id,
                                'tingkat_id' => $tingkat->id,
                                'kode' => fake()->randomNumber(4, true),
                                'nama' => 'Biologi',
                                'durasi' => fake()->randomElement([4, 6])
                            ],
                            [
                                'departemen_id' => $tingkat->departemen->id,
                                'tingkat_id' => $tingkat->id,
                                'kode' => fake()->randomNumber(4, true),
                                'nama' => 'Fisika',
                                'durasi' => fake()->randomElement([4, 6])
                            ],
                            [
                                'departemen_id' => $tingkat->departemen->id,
                                'tingkat_id' => $tingkat->id,
                                'kode' => fake()->randomNumber(4, true),
                                'nama' => 'Kimia',
                                'durasi' => fake()->randomElement([4, 6])
                            ],
                            [
                                'departemen_id' => $tingkat->departemen->id,
                                'tingkat_id' => $tingkat->id,
                                'kode' => fake()->randomNumber(4, true),
                                'nama' => 'Sejarah',
                                'durasi' => fake()->randomElement([4, 6])
                            ],
                            [
                                'departemen_id' => $tingkat->departemen->id,
                                'tingkat_id' => $tingkat->id,
                                'kode' => fake()->randomNumber(4, true),
                                'nama' => 'Geografi',
                                'durasi' => fake()->randomElement([4, 6])
                            ],
                            [
                                'departemen_id' => $tingkat->departemen->id,
                                'tingkat_id' => $tingkat->id,
                                'kode' => fake()->randomNumber(4, true),
                                'nama' => 'Ekonomi',
                                'durasi' => fake()->randomElement([4, 6])
                            ],
                            [
                                'departemen_id' => $tingkat->departemen->id,
                                'tingkat_id' => $tingkat->id,
                                'kode' => fake()->randomNumber(4, true),
                                'nama' => 'Matematika',
                                'durasi' => fake()->randomElement([4, 6])
                            ],
                        ]
                    )
                    ->each(function($mapel) {
                        //guru
                        $mapel->guru()->createMany(
                            [
                                [
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
                                ],
                                [
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
                                ],
                            ]
                        );
                    });
                });
        });
    }
}
