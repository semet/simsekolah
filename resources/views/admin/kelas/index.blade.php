<x-layouts.main>
    <x-slot:title>Kelas</x-slot:title>
    <x-slot:subtitle>Pengelolaan Ruang Kelas</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.admin.kelas/>
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

        @if ($kelas->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-striped mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kapasitas</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $kls)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $kls->nama }}</td>
                                <td>{{ $kls->kapasitas }}</td>
                                <td>@mdo</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif ($kelas->isEmpty() && request()->get('tingkat') != '')
            <blockquote class="blockquote font-size-18">
                <h5>Tidak ada Kelas di Tingkat yang dipilih. Silakan input</h5>
            </blockquote>
        @elseif ($kelas->isEmpty() && request()->get('tingkat') == '')
            <blockquote class="blockquote font-size-18">
                <h5>Silakan pilih Tingkat</h5>
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
                //
                $('#tingkat').change(function (e) {
                    e.preventDefault();
                    $('#kelasFilterForm').submit()
                });
            });
        </script>
    @endpush

    <x-admin.kelas.create/>

</x-layouts.main>
