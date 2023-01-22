<x-layouts.main>
    <x-slot:title>Rapot</x-slot:title>
    <x-slot:subtitle>Laporan hasil Belajar</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.siswa.rapot/>
    {{-- Card --}}
    <x-ui.card>

        <table class="table table-striped table-hover dt-responsive nowrap yajra-datatable">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th>Rata-rata</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </x-ui.card>

    @push('styles')
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
        <script>
            $(document).ready(function () {

                $('#tahun').change(function (e) {
                    e.preventDefault();
                    if(e.target.value == ''){
                        return;
                    }

                    axios.get(`/general/semester-by-tahun?tahun=${e.target.value}`)
                    .then((response) => {
                        if(response.status === 200){
                            console.log(response.data)
                            $('#semester').empty();
                            $('#semester').append(`<option value="" selected>--Semester--</option>`).removeAttr('disabled');
                            $.each(response.data.semester, function (idx, smt) {
                                $('#semester').append(`<option value="${smt.id}">${smt.nama}</option>`);
                            });
                        }
                    });
                });

                $('#semester').change(function (e) {
                    e.preventDefault();
                    $('#rapotFilterForm').submit();
                });
                //
                var url = '{{ route('siswa.rapot.list', ['tahun' => request()->get('tahun'), 'semester' => request()->get('semester')]) }}';
                var parseResult = new DOMParser().parseFromString(url, "text/html");
                var parsedUrl = parseResult.documentElement.textContent;

                var table = $('.yajra-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: parsedUrl,
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'mata_pelajaran', name: 'mata_pelajaran'},
                        {data: 'nilai', name: 'nilai'},
                        {data: 'rata_rata', name: 'rata_rata'},
                    ]
                });
            });


        </script>
    @endpush
</x-layouts.main>
