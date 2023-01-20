<x-layouts.main>
    <x-slot:title>Jadwal</x-slot:title>
    <x-slot:subtitle>Lihat Jadwal Mengajar</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.guru.rapot/>
    {{-- Card --}}
    <x-ui.card>
        <table class="table table-striped dt-responsive nowrap yajra-datatable">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Siswa</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th>Opsi</th>
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
                var semester = $('#semesterId');
                var kelas = $('#kelasId');
                $('#tahunId').change(function (e) {

                    e.preventDefault();

                    axios.get(`/general/semester-by-tahun?tahun=${e.target.value}`)
                    .then((response) => {
                        if(response.status === 200){
                            console.log(response.data)
                            semester.empty();
                            semester.append(`<option value="" selected>--Semester--</option>`).removeAttr('disabled');
                            $.each(response.data.semester, function (idx, smt) {
                                semester.append(`<option value="${smt.id}">${smt.nama}</option>`);
                            });
                        }
                    });

                    semester.change(function (e) {
                        e.preventDefault();
                        if(e.target.value === ''){
                            kelas.attr('disabled', true);
                            return;
                        }else{
                            kelas.removeAttr('disabled')
                        }
                    });

                    kelas.change(function (e) {
                        $('#rapotFilterForm').submit();
                    });


                });
                var url = '{{ route('guru.rapot.list', ['tahunId' => request()->get('tahunId'), 'semesterId' => request()->get('semesterId'), 'kelasId' => request()->get('kelasId')]) }}';
                var parseResult = new DOMParser().parseFromString(url, "text/html");
                var parsedUrl = parseResult.documentElement.textContent;

                var table = $('.yajra-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: parsedUrl,
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        {data: 'siswa', name: 'siswa'},
                        {data: 'mata_pelajaran', name: 'mata_pelajaran'},
                        {data: 'nilai', name: 'nilai'},
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },
                    ]
                });
            });

            function editRapot(id) {
                Swal.fire({
                    title: "Update nilai siswa",
                    input: "text",
                    showCancelButton: true,
                    confirmButtonText: 'Look up',
                    showLoaderOnConfirm: true,
                    preConfirm: function (nilai) {
                        return axios.post('{{ route('guru.rapot.update') }}', {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            nilai: nilai
                        })
                        .then(function(response) {
                            if(response.status === 200) {
                                console.log(response.data)
                                return response.data
                            }
                        })
                        .catch(function(error) {
                            if(error.name === 'AxiosError' && error.response.status === 422) {
                                Swal.showValidationMessage(
                                    `Gagal: Nilai tidak boleh kosong`
                                )
                            }else{
                                Swal.showValidationMessage(
                                    `Request failed: ${error.response.data.errors}`
                                )
                            }
                        })
                    },
                    allowOutsideClick: function() {
                        return !Swal.isLoading();
                    }
                }).then(function(result) {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: `${result.value.message}`,
                        }).then(function() {
                            location.reload();
                        })
                    }
                });
            }

        </script>
    @endpush
</x-layouts.main>
