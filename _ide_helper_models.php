<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property string $id
 * @property string $nama
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $telepon
 * @property string $password
 * @property string|null $foto
 * @property int $aktif
 * @property string|null $alamat
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\AdminFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Departemen
 *
 * @property string $id
 * @property string $nama
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Guru[] $guru
 * @property-read int|null $guru_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Jadwal[] $jadwal
 * @property-read int|null $jadwal_count
 * @property-read \App\Models\KepalaSekolah|null $kepalaSekolah
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pegawai[] $pegawai
 * @property-read int|null $pegawai_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Siswa[] $siswa
 * @property-read int|null $siswa_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tingkat[] $tingkat
 * @property-read int|null $tingkat_count
 * @method static \Database\Factories\DepartemenFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Departemen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departemen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departemen query()
 * @method static \Illuminate\Database\Eloquent\Builder|Departemen whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departemen whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departemen whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departemen whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Departemen whereUpdatedAt($value)
 */
	class Departemen extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Guru
 *
 * @property string $id
 * @property string $departemen_id
 * @property string $tingkat_id
 * @property string $mapel_id
 * @property string $nip
 * @property string $nuptk
 * @property string $nama
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $telepon
 * @property string $password
 * @property string $jenis_kelamin
 * @property string|null $foto
 * @property string|null $alamat
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property int $aktif
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Departemen|null $departemen
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Jadwal[] $jadwal
 * @property-read int|null $jadwal_count
 * @property-read \App\Models\Mapel|null $mapel
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rapot[] $rapot
 * @property-read int|null $rapot_count
 * @property-read \App\Models\Tingkat|null $tingkat
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\GuruFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guru newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guru query()
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereAktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereDepartemenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereMapelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereNuptk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereTingkatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guru whereUpdatedAt($value)
 */
	class Guru extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Jadwal
 *
 * @method static where(string $string, $id)
 * @property string $id
 * @property string $departemen_id
 * @property string $tingkat_id
 * @property string $tahun_id
 * @property string $semester_id
 * @property string $kelas_id
 * @property string $guru_id
 * @property string $hari
 * @property string $awal
 * @property string $akhir
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Departemen|null $departemen
 * @property-read \App\Models\Guru|null $guru
 * @property-read \App\Models\Kelas|null $kelas
 * @property-read \App\Models\Semester|null $semester
 * @property-read \App\Models\Tahun|null $tahun
 * @property-read \App\Models\Tingkat|null $tingkat
 * @method static \Database\Factories\JadwalFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereAkhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereAwal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereDepartemenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereHari($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereSemesterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereTahunId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereTingkatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadwal whereUpdatedAt($value)
 */
	class Jadwal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Kelas
 *
 * @property string $id
 * @property string $departemen_id
 * @property string $tingkat_id
 * @property string $nama
 * @property int $kapasitas
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Jadwal[] $jadwal
 * @property-read int|null $jadwal_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rapot[] $rapot
 * @property-read int|null $rapot_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Siswa[] $siswa
 * @property-read int|null $siswa_count
 * @property-read \App\Models\Tingkat|null $tingkat
 * @property-read \App\Models\Guru|null $waliKelas
 * @method static \Database\Factories\KelasFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereDepartemenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereKapasitas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereTingkatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kelas whereUpdatedAt($value)
 */
	class Kelas extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\KepalaSekolah
 *
 * @property string $id
 * @property string $departemen_id
 * @property string $nip
 * @property string $nama
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $telepon
 * @property string $password
 * @property string $jenis_kelamin
 * @property string|null $foto
 * @property string|null $alamat
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property int $aktif
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Departemen|null $departemen
 * @method static \Database\Factories\KepalaSekolahFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah query()
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereAktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereDepartemenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KepalaSekolah whereUpdatedAt($value)
 */
	class KepalaSekolah extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Mapel
 *
 * @property string $id
 * @property string $departemen_id
 * @property string $tingkat_id
 * @property string $kode
 * @property string $nama
 * @property int $durasi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Guru[] $guru
 * @property-read int|null $guru_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rapot[] $rapot
 * @property-read int|null $rapot_count
 * @property-read \App\Models\Tingkat|null $tingkat
 * @method static \Database\Factories\MapelFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereDepartemenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereDurasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereTingkatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mapel whereUpdatedAt($value)
 */
	class Mapel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pegawai
 *
 * @property string $id
 * @property string $departemen_id
 * @property string $nip
 * @property string $nuptk
 * @property string $nama
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $telepon
 * @property string $password
 * @property string $jenis_kelamin
 * @property string $jabatan
 * @property string|null $foto
 * @property string|null $alamat
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property int $aktif
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Departemen|null $departemen
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\PegawaiFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereAktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereDepartemenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereNuptk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pegawai whereUpdatedAt($value)
 */
	class Pegawai extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rapot
 *
 * @property string $id
 * @property string $tahun_id
 * @property string $semester_id
 * @property string $guru_id
 * @property string $mapel_id
 * @property string $kelas_id
 * @property string $siswa_id
 * @property int $nilai
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Guru|null $guru
 * @property-read \App\Models\Kelas|null $kelas
 * @property-read \App\Models\Mapel|null $mapel
 * @property-read \App\Models\Semester|null $semester
 * @property-read \App\Models\Siswa|null $siswa
 * @property-read \App\Models\Tahun|null $tahun
 * @method static \Database\Factories\RapotFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereGuruId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereMapelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereNilai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereSemesterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereSiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereTahunId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rapot whereUpdatedAt($value)
 */
	class Rapot extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Semester
 *
 * @property string $id
 * @property string $tahun_id
 * @property string $nama
 * @property string $awal
 * @property string $akhir
 * @property int $aktif
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Jadwal[] $jadwal
 * @property-read int|null $jadwal_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rapot[] $rapot
 * @property-read int|null $rapot_count
 * @property-read \App\Models\Tahun|null $tahun
 * @method static \Database\Factories\SemesterFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Semester newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Semester query()
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereAkhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereAktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereAwal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereTahunId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Semester whereUpdatedAt($value)
 */
	class Semester extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Siswa
 *
 * @property string $id
 * @property string $departemen_id
 * @property string $tingkat_id
 * @property string $kelas_id
 * @property string $nis
 * @property string $nisn
 * @property string $nama
 * @property string $telepon
 * @property string $password
 * @property string $jenis_kelamin
 * @property string $agama
 * @property string|null $foto
 * @property string|null $alamat
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property int $aktif
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Departemen|null $departemen
 * @property-read \App\Models\Kelas|null $kelas
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rapot[] $rapot
 * @property-read int|null $rapot_count
 * @property-read \App\Models\Tingkat|null $tingkat
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\SiswaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereAgama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereAktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereDepartemenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereKelasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereNis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereNisn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereTingkatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Siswa whereUpdatedAt($value)
 */
	class Siswa extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tahun
 *
 * @property string $id
 * @property string $nama
 * @property string $awal
 * @property string $akhir
 * @property int $aktif
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Jadwal[] $jadwal
 * @property-read int|null $jadwal_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rapot[] $rapot
 * @property-read int|null $rapot_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Semester[] $semester
 * @property-read int|null $semester_count
 * @method static \Database\Factories\TahunFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Tahun newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tahun newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tahun query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tahun whereAkhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tahun whereAktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tahun whereAwal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tahun whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tahun whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tahun whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tahun whereUpdatedAt($value)
 */
	class Tahun extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tingkat
 *
 * @property string $id
 * @property string $departemen_id
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Departemen|null $departemen
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Guru[] $guru
 * @property-read int|null $guru_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Jadwal[] $jadwal
 * @property-read int|null $jadwal_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Kelas[] $kelas
 * @property-read int|null $kelas_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Mapel[] $mapel
 * @property-read int|null $mapel_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Siswa[] $siswa
 * @property-read int|null $siswa_count
 * @method static \Database\Factories\TingkatFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Tingkat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tingkat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tingkat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tingkat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tingkat whereDepartemenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tingkat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tingkat whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tingkat whereUpdatedAt($value)
 */
	class Tingkat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

