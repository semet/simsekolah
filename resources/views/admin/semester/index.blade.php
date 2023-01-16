<x-layouts.main>
    <x-slot:title>Semester</x-slot:title>
    <x-slot:subtitle>Pengelolaan Semster</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.admin.semester/>
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

        @if ($semester->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-striped mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Awal</th>
                            <th>Akhir</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($semester as $sm)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $sm->nama }}</td>
                                <td>{{ $sm->awal }}</td>
                                <td>{{ $sm->akhir }}</td>
                                <td>
                                    @if($sm->aktif)
                                    <span class="badge bg-primary">Aktif</span>
                                    @else
                                    <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td>@mdo</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif ($semester->isEmpty() && request()->get('tahun') != '')
            <blockquote class="blockquote font-size-18">
                <h5>Tidak ada smester di Tahun Ajaran yang dipilih. Silakan input</h5>
            </blockquote>
        @elseif ($semester->isEmpty() && request()->get('tahun') == '')
            <blockquote class="blockquote font-size-18">
                <h5>Silakan pilih Tahun Ajaran</h5>
            </blockquote>
        @endif
    </x-ui.card>

    @push('styles')

    @endpush

    @push('scripts')
        <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#tahun').change(function (e) {
                    e.preventDefault();
                    if(e.target.value == '' || e.target.value == '{{ request()->get('tahun') }}'){
                        return;
                    }
                    $('#semesterFilterForm').submit();
                });
            });
        </script>
    @endpush

    <x-admin.semester.create/>

</x-layouts.main>
