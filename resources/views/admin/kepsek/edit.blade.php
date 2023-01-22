<x-layouts.main>
    <x-slot:title>Edit Kepala Sekolah</x-slot:title>
    <x-slot:subtitle>Edit Data Kepala Sekolah</x-slot:subtitle>
    {{-- Card --}}
    <x-ui.card>

        <form action="{{ route('admin.kepsek.update', $kepsek->id) }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-6">

                    <div class="mb-3">
                        <label for="departemenId" class="form-label">Departemen</label>
                        <select name="departemenId" id="departemenId" class="form-select @error('departemenId') is-invalid @enderror">
                            <option value="" selected>--Pilih Departemen--</option>
                            @foreach ($departemen as $dep)
                                <option value="{{ $dep->id }}" @selected($kepsek->departemen->id == $dep->id)>{{ $dep->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP Lengkap</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" value="{{ $kepsek->nip }}">
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ $kepsek->nama }}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ $kepsek->email }}" readonly disabled style="background-color: gainsboro">
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" value="{{ $kepsek->telepon }}" readonly disabled style="background-color: gainsboro">
                    </div>


                </div>

                <div class="col-md-6">

                    <div class="mb-3">
                        <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenisKelamin" id="jenisKelamin" class="form-select @error('jenisKelamin') is-invalid @enderror">
                            <option value="" selected>--Pilih Jenis Kelamin--</option>
                            <option value="Laki-laki" @selected($kepsek->jenis_kelamin == 'Laki-laki')>Laki-laki</option>
                            <option value="Perempuan" @selected($kepsek->jenis_kelamin == 'Perempuan')>Perempuan</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 54px">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ $kepsek->alamat }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                <textarea class="form-control" name="tempatLahir" id="tempatLahir" rows="1">{{ $kepsek->tempat_lahir }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggalLahir" id="tanggalLahir" value="{{ $kepsek->tanggal_lahir }}">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="my-4 d-flex justify-content-center gap-2">
                    <button class="btn btn-danger">Cancle</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>

        </form>

    </x-ui.card>

    @push('styles')

    @endpush

    @push('scripts')

    @endpush
</x-layouts.main>
