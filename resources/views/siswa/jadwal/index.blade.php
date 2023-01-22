<x-layouts.main>
    <x-slot:title>Jadwal Belajar mengajar</x-slot:title>
    <x-slot:subtitle>Lihat Jadwal</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.siswa.jadwal/>
    {{-- Card --}}
    <x-ui.card>

        <table class="table table-striped table-hover dt-responsive nowrap yajra-datatable">

            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Dari jam</th>
                    <th>Sampai</th>
                    <th>Guru Pembina</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </x-ui.card>

    @push('styles')
        {{-- Sweet Alert --}}
        <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- DataTables -->
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">

        <!-- Responsive datatable examples -->
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/libs/axios/axios.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
         <!-- Sweet Alerts js -->
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script>
            $(document).ready(function () {

                $('#hari').change(function (e) {
                    e.preventDefault();
                    $('#jadwalFilterForm').submit()
                });

                var url = '{{ route('siswa.jadwal.list', ['hari' => request()->get('hari')]) }}';
                var parseResult = new DOMParser().parseFromString(url, "text/html");
                var parsedUrl = parseResult.documentElement.textContent;

                var table = $('.yajra-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: parsedUrl,
                    columns: [
                        {data: 'hari', name: 'hari'},
                        {data: 'awal', name: 'awal'},
                        {data: 'akhir', name: 'akhir'},
                        {data: 'guru', name: 'guru'}
                    ]
                });
            });


        </script>
    @endpush
</x-layouts.main>
