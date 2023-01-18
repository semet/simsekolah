<x-layouts.main>
    <x-slot:title>Jadwal</x-slot:title>
    <x-slot:subtitle>Jadwal Belajar Mengajar</x-slot:subtitle>

    {{-- Toolbars --}}
    <x-toolbars.operator.jadwal/>
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

        @if ($jadwal->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-striped mb-0">

                    <thead>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Jam</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $jd)
                            <tr>
                                <th scope="row">{{ $jd->guru->mapel->nama }}</th>
                                <td>{{ $jd->guru->nama }}</td>
                                <td>{{ $jd->awal.' s/d '.$jd->akhir }}</td>
                                <td>@mdo</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @elseif ($jadwal->isEmpty() && request()->get('kelas') != '')
            <blockquote class="blockquote font-size-18">
                <h5>Tidak ada Jadwal di Kelas yang dipilih. Silakan input</h5>
            </blockquote>
        @elseif ($jadwal->isEmpty() && request()->get('kelas') == '')
            <blockquote class="blockquote font-size-18">
                <h5>Silakan pilih Kelas</h5>
            </blockquote>
        @endif
    </x-ui.card>

    @push('styles')

    @endpush

    @push('scripts')
        <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
        <script src="{{ asset('assets/libs/axios/axios.min.js') }}"></script>

        <script>
            $(document).ready(function () {
                $('#tingkat').change(function (e) {
                    e.preventDefault();
                    axios.get(`/general/kelas-by-tingkat?tingkat=${e.target.value}`)
                    .then((res) => {
                        // determain which id is curently selcted
                        $('#kelas').empty();
                        $('#kelas').append(`<option value="" selected>--Pilih Kelas--</option>`);
                        $.each(res.data.kelas, function (idx, kelas) {
                            $('#kelas').append(`<option value="${kelas.id}">${kelas.nama}</option>`);
                        });
                    })
                });


                //
                $('#hari').change(function (e) {
                    e.preventDefault();
                    var tingkat = $('#tingkat').val();
                    var kelas = $('#kelas').val();
                    var hari = $('#hari').val();

                    location.href = `{{ route('operator.jadwal') }}?tingkat=${tingkat}&kelas=${kelas}&hari=${hari}`

                    // $('#jadwalFilterForm').submit();
                });
            });
        </script>
    @endpush
</x-layouts.main>
