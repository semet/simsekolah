<x-layouts.main>
    <x-slot:title>Guru</x-slot:title>
    <x-slot:subtitle>Pengelolaan Data Guru</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.admin.guru/>
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

        @if ($guru->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-striped mb-0">

                    <thead>
                        <tr>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Mata Pelajaran</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guru as $gr)
                            <tr>
                                <th scope="row">{{ $gr->nip }}</th>
                                <td>{{ $gr->nama }}</td>
                                <td>{{ $gr->email }}</td>
                                <td>{{ $gr->mapel->nama }}</td>
                                <td>@mdo</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif ($guru->isEmpty() && request()->get('tingkat') != '')
            <blockquote class="blockquote font-size-18">
                <h5>Tidak ada Guru di Tingkat yang dipilih. Silakan input</h5>
            </blockquote>
        @elseif ($guru->isEmpty() && request()->get('tingkat') == '')
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
                    $('#guruFilterForm').submit()
                });
            });
        </script>
    @endpush

</x-layouts.main>
