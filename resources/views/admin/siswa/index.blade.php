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

            <table class="table table-striped dt-responsive nowrap yajra-datatable">

                <thead>
                <tr>
                    <th>NIS</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
    </x-ui.card>

    @push('styles')
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
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
                $('#tahun').change(function (e) {
                    e.preventDefault();
                    $('#siswaFilterForm').submit()
                });
                //
                var url = '{{ route('admin.siswa.list', ['kelasId' => request()->get('kelas'), 'tahunId' => request()->get('tahun')]) }}';
                var parseResult = new DOMParser().parseFromString(url, "text/html");
                var parsedUrl = parseResult.documentElement.textContent;
                var table = $('.yajra-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: parsedUrl,
                    columns: [
                        {data: 'nis', name: 'nis'},
                        {data: 'nisn', name: 'nisn'},
                        {data: 'nama', name: 'nama'},
                        {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true,
                        },
                    ]
                });
            });
        </script>
    @endpush

</x-layouts.main>
