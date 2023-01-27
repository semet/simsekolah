<?php

namespace Database\Seeders;

use App\Models\Departemen;
use App\Models\Pegawai;
use App\Models\Semester;
use App\Models\Tahun;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departemen::factory()->create()->each(function ($departemen) {
            $pegawai = [];
            for ($i = 0; $i <= 6; $i++){
                $data = [
                    'departemen_id' =>$departemen->id,
                    'nip' => fake()->randomNumber(8, true),
                    'nuptk' => fake()->randomNumber(8, true),
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
                array_push($pegawai, $data);
            }
            Pegawai::factory()->createMany($pegawai);
            $tahun = Tahun::factory()->createMany([
                [
                   'id' => Str::uuid(),
                   'nama' => '2021/2022',
                   'awal' => Carbon::parse('01-07-2021'),
                   'akhir' => Carbon::parse('30-06-2022'),
                   'aktif' => 0
               ],
               [
                   'id' => Str::uuid(),
                   'nama' => '2022/2023',
                   'awal' => Carbon::parse('01-07-2022'),
                   'akhir' => Carbon::parse('30-06-2023'),
                   'aktif' => 0
               ]
            ])->each(function ($tahun) {
               $tahun->semester()->createMany([
                   [
                       'id' => Str::uuid(),
                       'tahun_id' => $tahun->id,
                       'nama' => 'Ganjil',
                       'awal' => Carbon::parse('01-07-2021'),
                       'akhir' => Carbon::parse('30-12-2021'),
                   ],
                   [
                       'id' => Str::uuid(),
                       'tahun_id' => $tahun->id,
                       'nama' => 'Genap',
                       'awal' => Carbon::parse('01-01-2022'),
                       'akhir' => Carbon::parse('30-6-2022'),
                   ]
               ]);
            });
            $departemen->tingkat()->createMany([
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
            ])->each(function ($tingkat) use ($tahun) {
                $tingkat->mapel()->createMany([
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
               ])->each(function ($mapel) {
                   $guru = [];
                   for($i = 0; $i <= 12; $i++){
                       $data = [
                           'departemen_id' => $mapel->tingkat->departemen->id,
                           'tingkat_id' => $mapel->tingkat->id,
                           'mapel_id' => $mapel->id,
                           'nip' => fake()->randomNumber(8, true),
                           'nuptk' => fake()->randomNumber(8, true),
                           'nama' => fake()->name(),
                           'email' => fake()->safeEmail(),
                           'telepon' => fake()->phoneNumber(),
                           'password' => bcrypt('secret'),
                           'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                           'foto' => fake()->imageUrl(),
                           'alamat' => fake()->address(),
                           'tempat_lahir' => fake()->streetAddress(),
                           'tanggal_lahir' => fake()->date(),
                       ];

                       array_push($guru, $data);
                   }
                   $mapel->guru()->createMany($guru);
               });
                $tingkat->kelas()->createMany([
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
                ])->each(function($kelas) use($tahun) {
                    $tahun->each(function ($th) use($kelas){
                        $siswa = [];
                        for($i = 0; $i <= 20; $i++) {
                              $data = [
                                  'departemen_id' => $kelas->tingkat->departemen->id,
                                  'tingkat_id' => $kelas->tingkat->id,
                                  'kelas_id' => $kelas->id,
                                  'tahun_id' => $th->id,
                                  'nis' => fake()->randomNumber(7, true),
                                  'nisn' => fake()->randomNumber(8, true),
                                  'nama' => fake()->name(),
                                  'email' => fake()->safeEmail(),
                                  'telepon' => fake()->phoneNumber(),
                                  'password' => bcrypt('secret'),
                                  'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
                                  'agama' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                                  'foto' => fake()->imageUrl(),
                                  'alamat' => fake()->address(),
                                  'tempat_lahir' => fake()->streetName(),
                                  'tanggal_lahir' => fake()->date(),
                              ];
                                array_push($siswa, $data);
                        }
                        $kelas->siswa()->createMany($siswa);
                    });
              } );
            });
        });
    }
}
