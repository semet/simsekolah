<x-layouts.main>
    <x-slot:title>Kelas</x-slot:title>
    <x-slot:subtitle>Pengelolaan Ruang Kelas</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.admin.mapel :departemen="$departemen"/>
    {{-- Card --}}
    <x-ui.card width="8" class="mx-auto">
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
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Alokasi Waktu</th>
                    <th class="d-flex justify-content-start">Opsi</th>
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
                $('#departemen, #departemenId, #departemenIdEdit').change(function (e) {
                    axios.get(`/general/tingkat-by-departemen?departemen=${e.target.value}`)
                    .then((res) => {
                        // determain which id is curently selcted
                        if($(this)[0].id === 'departemen') {
                            $('#tingkat').empty();
                            $('#tingkat').append(`<option value="" selected>--Pilih Tingkat--</option>`);
                            $.each(res.data.tingkat, function (idx, tingkat) {
                                $('#tingkat').append(`<option value="${tingkat.id}">${tingkat.nama}</option>`);
                            });
                        }else  if($(this)[0].id === 'departemenIdEdit') {
                            $('#tingkatIdEdit').empty();
                            $('#tingkatIdEdit').append(`<option value="" selected>--Pilih Tingkat--</option>`);
                            $.each(res.data.tingkat, function (idx, tingkat) {
                                $('#tingkatIdEdit').append(`<option value="${tingkat.id}">${tingkat.nama}</option>`);
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
                    $('#mapelFilterForm').submit()
                });
                //
                var url = '{{ route('admin.mapel.list', ['departemenId' => request()->get('departemen'), 'tingkatId' => request()->get('tingkat')]) }}';
                var parseResult = new DOMParser().parseFromString(url, "text/html");
                var parsedUrl = parseResult.documentElement.textContent;
                var table = $('.yajra-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: parsedUrl,
                    columns: [
                        {data: 'kode', name: 'kode'},
                        {data: 'nama', name: 'nama'},
                        {data: 'durasi', name: 'durasi'},
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true,
                        },
                    ]
                });
                //
                $('#editMapel').on('show.bs.modal', function (e) {
                    const id = e.relatedTarget.id;
                    const url = '{{ route('admin.mapel.edit', ':param') }}'
                    const parsedUrl = url.replace(':param', id)
                    //
                    axios.get(parsedUrl)
                    .then(function (response) {
                        $('#idEdit').val(response.data.mapel.id);
                        $('#kodeEdit').val(response.data.mapel.kode);
                        $('#namaEdit').val(response.data.mapel.nama);
                        $('#durasiEdit').val(response.data.mapel.durasi);
                    }).then(function () {
                        console.log($('#departemenIdEdit').val())
                    })
                })
            });
            //
            function deleteMapel (id) {
                Swal.fire({
                    title: "Anda yakin?",
                    text: "Proses ini tidak bisa dibatalkan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#34c38f",
                    cancelButtonColor: "#f46a6a",
                    confirmButtonText: "Ya, hapus!"
                }).then(function (result) {
                    if (result.isConfirmed) {
                        axios.post('{{ route('admin.mapel.delete') }}', {
                            _token: '{{ csrf_token() }}',
                            id: id
                        }).then(function(response) {
                            if(response.status === 201) {
                                Swal.fire("Berhasil!", response.data.message, "success")
                                .then(function (result) {
                                    if(result.isConfirmed) {
                                        location.reload()
                                    }
                                });
                            }
                        })
                    }
                }).then(function(result) {
                    console.log(result)
                });
            }
        </script>
    @endpush
    {{-- Create --}}
    <x-admin.mapel.create :departemen="$departemen"/>
    {{-- Edit --}}
    <x-admin.mapel.edit :departemen="$departemen"/>

</x-layouts.main>
