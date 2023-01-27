<x-layouts.main>
    <x-slot:title>Input Guru</x-slot:title>
    <x-slot:subtitle>Input Data Guru</x-slot:subtitle>
    {{-- Card --}}
    <x-ui.card>
        @if(session('error'))
            <div class="py-3">
                <x-ui.alert type="danger" message="{{ session('error') }}" />
            </div>
        @endif

        <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-6">

                    <div class="mb-3">
                        <label for="departemenId" class="form-label">Departemen</label>
                        <select name="departemenId" id="departemenId" class="form-select @error('departemenId') is-invalid @enderror">
                            <option value="" selected>--Pilih Departemen--</option>
                            @foreach ($departemen as $dep)
                                <option value="{{ $dep->id }}">{{ $dep->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tingkatId" class="form-label">Tingkat</label>
                        <select name="tingkatId" id="tingkatId" class="form-select @error('tingkatId') is-invalid @enderror">
                            <option value="" selected></option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="mapelId" class="form-label">Mapel</label>
                        <select name="mapelId" id="mapelId" class="form-select @error('mapelId') is-invalid @enderror">
                            <option value="" selected></option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip">
                    </div>

                    <div class="mb-3">
                        <label for="nuptk" class="form-label">NUPTK</label>
                        <input type="text" class="form-control @error('nuptk') is-invalid @enderror" name="nuptk" id="nuptk">
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="mb-3">
                        <label for="telepon" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" id="telepon">
                    </div>

                    <div class="mb-3">
                        <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenisKelamin" id="jenisKelamin" class="form-select @error('jenisKelamin') is-invalid @enderror">
                            <option value="" selected>--Pilih Jenis Kelamin--</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 54px">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                <textarea class="form-control" name="tempatLahir" id="tempatLahir" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggalLahir" id="tanggalLahir">
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
        <script src="{{ asset('assets/libs/axios/axios.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#departemenId').change(function (e) {
                    e.preventDefault()
                    var url = '{{ route('general.tingkat.by.departemen') }}' + '?departemen='+$(this).val()
                    axios.get(url)
                    .then(function (response) {
                        $('#tingkatId').empty()
                        $('#tingkatId').append(`<option selected value="">--Pilih Tingkat--</option>`)
                        $.each(response.data.tingkat, function (idx, tingkat) {
                            $('#tingkatId').append(`<option value="${tingkat.id}">${tingkat.nama}</option>`)
                        });
                    })
                });
                $('#tingkatId').change(function (e) {
                    e.preventDefault();
                    var url = '{{ route('general.mapel.by.tingkat') }}' + '?tingkat='+$(this).val()
                    axios.get(url)
                    .then(function (response) {
                        $('#mapelId').empty()
                        $('#mapelId').append(`<option selected value="">--Pilih Mata Pelajaran--</option>`)
                        $.each(response.data.mapel, function (idx, mapel) {
                            $('#mapelId').append(`<option value="${mapel.id}">${mapel.nama}</option>`)
                        });
                    })
                });
            });
        </script>
    @endpush
</x-layouts.main>
