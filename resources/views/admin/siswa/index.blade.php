<x-layouts.main>
    <x-slot:title>Siswa</x-slot:title>
    <x-slot:subtitle>Pengelolaan Data Siswa</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.admin.siswa/>
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

        @if ($siswa->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-striped mb-0">

                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Jenis Kelamin</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $sis)
                            <tr>
                                <th scope="row">{{ $sis->nisn }}</th>
                                <td>{{ $sis->nama }}</td>
                                <td>{{ $sis->nis }}</td>
                                <td>{{ $sis->jenis_kelamin }}</td>
                                <td>@mdo</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif ($siswa->isEmpty() && request()->get('kelas') != '')
            <blockquote class="blockquote font-size-18">
                <h5>Tidak ada Siswa di Kelas yang dipilih. Silakan input</h5>
            </blockquote>
        @elseif ($siswa->isEmpty() && request()->get('kelas') == '')
            <blockquote class="blockquote font-size-18">
                <h5>Silakan pilih Departemen, Tingkat dan Kelas</h5>
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
                $('#departemen, #departemenId').change(function (e) {
                    e.preventDefault();
                    if(e.target.value == '' || e.target.value == '{{ request()->get('tingkat') }}'){
                        return;
                    }
                    axios.get(`/general/tingkat-by-departemen?departemen=${e.target.value}`)
                    .then((res) => {
                        // determain which id is curently selcted
                        if($(this)[0].id === 'departemen') {
                            $('#tingkat').empty();
                            $('#tingkat').append(`<option value="" selected>--Pilih Tingkat--</option>`);
                            $.each(res.data.tingkat, function (idx, tingkat) {
                                $('#tingkat').append(`<option value="${tingkat.id}">${tingkat.nama}</option>`);
                            });
                        }else{
                            $('#tingkatId').empty();
                            $('#tingkatId').append(`<option value="" selected>--Pilih Tingkat--</option>`);
                            $.each(res.data.tingkat, function (idx, tingkat) {
                                $('#tingkatId').append(`<option value="${tingkat.id}">${tingkat.nama}</option>`);
                            });
                        }

                    })
                });

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

                })
                //
                $('#kelas').change(function (e) {
                    e.preventDefault();
                    location.href = `/admin/siswa?kelas=${e.target.value}`;
                });
            });
        </script>
    @endpush

</x-layouts.main>
