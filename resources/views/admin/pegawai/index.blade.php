<x-layouts.main>
    <x-slot:title>Pegawai</x-slot:title>
    <x-slot:subtitle>Pengelolaan Data Pegawai</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.admin.pegawai/>
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

        @if ($pegawai->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-striped mb-0">

                    <thead>
                        <tr>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $gr)
                            <tr>
                                <th scope="row">{{ $gr->nip }}</th>
                                <td>{{ $gr->nama }}</td>
                                <td>{{ $gr->email }}</td>
                                <td>{{ $gr->jabatan }}</td>
                                <td>@mdo</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif ($pegawai->isEmpty() && request()->get('departemen') != '')
            <blockquote class="blockquote font-size-18">
                <h5>Tidak ada Pegawai di Departemen yang dipilih. Silakan input</h5>
            </blockquote>
        @elseif ($pegawai->isEmpty() && request()->get('departemen') == '')
            <blockquote class="blockquote font-size-18">
                <h5>Silakan pilih Departemen</h5>
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
                    if(e.target.value == '' || e.target.value == '{{ request()->get('departemen') }}'){
                        return;
                    }
                    $('#pegawaiFilterForm').submit()
                });
            });
        </script>
    @endpush

</x-layouts.main>
