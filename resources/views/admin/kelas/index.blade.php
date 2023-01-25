<x-layouts.main>
    <x-slot:title>Kelas</x-slot:title>
    <x-slot:subtitle>Pengelolaan Ruang Kelas</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.admin.kelas/>
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
                                <td class="d-flex justify-content-end">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Tahun Options">
                                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editKelas" id="{{ $kls->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger" onclick="deleteKelas('{{ $kls->id }}')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
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
        <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
        <script src="{{ asset('assets/libs/axios/axios.min.js') }}"></script>

        <script>
            $(document).ready(function () {
                $('#departemen, #departemenId, #departemenIdEdit').change(function (e) {
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
                        }else if($(this)[0].id === 'departemenIdEdit') {
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
                    $('#kelasFilterForm').submit()
                });
                //
                $('#editKelas').on('show.bs.modal', function (e) {
                    const id = e.relatedTarget.id;
                    const url = '{{ route('admin.kelas.edit', ':param') }}'
                    const parsedUrl = url.replace(':param', id)

                    axios.get(parsedUrl)
                    .then(function (response) {
                        $('#idEdit').val(response.data.kelas.id);
                        $('#namaEdit').val(response.data.kelas.nama);
                    }).then(function () {
                        console.log($('#departemenIdEdit').val())
                    })
                })
            });
            // delete
            function deleteKelas (id) {
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
                        axios.post('{{ route('admin.kelas.delete') }}', {
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
    <x-admin.kelas.create :departemen="$departemen"/>
    {{-- Edit --}}
    <x-admin.kelas.edit :departemen="$departemen"/>

</x-layouts.main>
