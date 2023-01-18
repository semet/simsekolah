<x-layouts.main>
    <x-slot:title>Jadwal</x-slot:title>
    <x-slot:subtitle>Input Jadwal</x-slot:subtitle>

    {{-- Card --}}
    <x-ui.card>
        @if(session('message'))
            <div class="py-3">
                <x-ui.alert type="success" message="{{ session('message') }}" />
            </div>
        @elseif(session('error'))
            <div class="py-3">
                <x-ui.alert type="danger" message="{{ session('error') }}" />
            </div>
        @endif
        <form class="row needs-validation" action="{{ route('operator.jadwal.store') }}" method="POST" novalidate>

            <div class="col-md-12">

                <div class="row">

                    @csrf

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="guruId" class="form-label">Guru</label>
                            <select name="guruId" id="guruId" class="form-select" required>
                                <option value="" selected>--Pilih Guru--</option>
                                @foreach ($guru as $gr)
                                    <option value="{{ $gr->id }}">{{ $gr->nama }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Guru harus diisi
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="tingkatId" id="tingkatId">

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="kelasId" class="form-label">Kelas</label>
                            <select name="kelasId" id="kelasId" class="form-select" disabled required>
                                <option value="" selected>--Pilih Kelas--</option>
                                <option value=""></option>
                            </select>
                            <div class="invalid-feedback">
                                Kelas harus diisi
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <select name="hari" id="hari" class="form-select" required>
                                <option value="" selected>--Hari--</option>
                                <option value="senin">senin</option>
                                <option value="selasa">selasa</option>
                                <option value="rabu">rabu</option>
                                <option value="kamis">kamis</option>
                                <option value="jumat">jumat</option>
                                <option value="sabtu">sabtu</option>
                            </select>
                            <div class="invalid-feedback">
                                Hari harus diisi
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="awal" class="form-label">Jam Awal</label>
                            <input type="time" class="form-control" name="awal" id="awal" required>
                            <div class="invalid-feedback">
                                Jam Awal harus diisi
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="akhir" class="form-label">Jam Akhir</label>
                            <input type="time" class="form-control" name="akhir" id="akhir" required>
                            <div class="invalid-feedback">
                                Jam Akhir harus diisi
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 my-auto">
                        <button class="btn btn-primary mt-3" type="submit">Save</button>
                    </div>

                </div>
            </div>
        </form>
    </x-ui.card>

    @push('styles')

    @endpush

    @push('scripts')
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ asset('assets/libs/axios/axios.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#guruId').change(function (e) {

                e.preventDefault();

                if(e.target.value == '' ){
                    return;
                }
                //
                axios.get(`/general/kelas-by-guru?guru=${e.target.value}`)
                .then((response) => {
                    //
                    $('#tingkatId').attr('value', response.data.tingkatId);
                    //
                    $('#kelasId').empty();
                    $('#kelasId').removeAttr('disabled');
                    $('#kelasId').append(`<option value="" selected>--Pilih Kelas--</option>`);
                    $.each(response.data.kelas, function (idx, kelas) {
                        $('#kelasId').append(`<option value="${kelas.id}">${kelas.nama}</option>`);
                    });
                })
            });
        });
    </script>
    @endpush
</x-layouts.main>
