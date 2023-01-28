<x-layouts.main>
    <x-slot:title>Profil Siswa: {{ $siswa->nama }}</x-slot:title>
    <x-slot:subtitle>Profil Siswa</x-slot:subtitle>
    <x-ui.card class="mt-4 mx-auto" width="8">
        @if(session('message'))
            <div class="py-3">
                <x-ui.alert type="success" message="{{ session('message') }}" />
            </div>
        @endif
        <div class="d-flex gap-4">
            <div class="d-flex flex-column gap-2">
                <div style="max-width: 300px">
                    @if(file_exists(public_path('storage/siswa/'.$siswa->foto)))
                        <img src="{{ asset('storage/siswa/'.$siswa->foto) }}" class="avatar rounded rounded-sm shadow shadow-md w-100" alt="{{ $siswa->nama }}">
                    @else
                        <img src="{{ asset('assets/images/users/avatar-8.jpg') }}" class="avatar rounded rounded-sm shadow shadow-md w-100" alt="{{ $siswa->nama }}">
                    @endif
                </div>
                <div class="d-flex gap-2 justify-content-center">
                    <button class="btn btn-outline-primary rounded rounded-circle">
                        <i class="fab fa-facebook"></i>
                    </button>
                    <button class="btn btn-outline-danger rounded rounded-circle">
                        <i class="fab fa-instagram"></i>
                    </button>
                    <button class="btn btn-outline-info rounded rounded-circle">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button class="btn btn-outline-danger rounded rounded-circle">
                        <i class="fas fa-envelope"></i>
                    </button>
                </div>
            </div>
            <div class="flex-1 border border-2 rounded rounded-md px-4 detail-card">
                <div class="card-actions">
                    <a class="btn btn-outline-success rounded rounded-circle card-action-button" href="{{ route('admin.siswa.edit', $siswa->id) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </div>
                <dl class="row">
                    <dt class="col-sm-2 my-3">NIS</dt>
                    <dd class="col-sm-10 my-3">: {{ $siswa->nis }}</dd>
                    <dt class="col-sm-2 my-3">NISN</dt>
                    <dd class="col-sm-10 my-3">: {{ $siswa->nisn }}</dd>
                    <dt class="col-sm-2 my-3">Nama</dt>
                    <dd class="col-sm-10 my-3">: {{ $siswa->nama }}</dd>
                    <dt class="col-sm-2 my-3">E-Mail</dt>
                    <dd class="col-sm-10 my-3">: {{ $siswa->email }}</dd>
                    <dt class="col-sm-2 my-3">No. Telepon</dt>
                    <dd class="col-sm-10 my-3">: {{ $siswa->telepon }}</dd>
                    <dt class="col-sm-2 my-3">Jenis Kelamin</dt>
                    <dd class="col-sm-10 my-3">: {{ $siswa->jenis_kelamin }}</dd>
                    <dt class="col-sm-2 my-3">Alamat</dt>
                    <dd class="col-sm-10 my-3">: {{ $siswa->alamat }}</dd>
                    <dt class="col-sm-2 my-3">Tempat/Tgl. Lahir</dt>
                    <dd class="col-sm-10 my-3">: {{ $siswa->tempat_lahir.', '.\Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d, M Y') }}</dd>
                </dl>
            </div>
        </div>
    </x-ui.card>
    @push('styles')
        <link href="{{ asset('assets/css/pages/guru-detail.css') }}" rel="stylesheet" type="text/css">
    @endpush
</x-layouts.main>
