<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <h1>Selamat Datang Pak Kepala Sekolah</h1>
    <h2>{{ $kepsek->nama }}</h2>
    <p>Silakan klik <a href="{{ route('kepsek.email.verify', $kepsek->id) }}">link</a> ini untuk aktivasi Akun anda</p>
</body>
</html>
