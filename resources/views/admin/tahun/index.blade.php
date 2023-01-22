<x-layouts.main>
    <x-slot:title>Tahun Ajaran</x-slot:title>
    <x-slot:subtitle>Pengelolaan Tahun Ajaran</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.admin.tahun/>
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
        <div class="table-responsive">
            <table class="table table-striped mb-0">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tahun Ajaran</th>
                        <th>Awal</th>
                        <th>Akhir</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tahun as $th)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $th->nama }}</td>
                            <td>{{ $th->awal }}</td>
                            <td>{{ $th->akhir }}</td>
                            <td>
                                @if($th->aktif)
                                <span class="badge bg-primary">Aktif</span>
                                @else
                                <span class="badge bg-danger">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Tahun Options">
                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editTahun" id="{{ $th->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger" onclick="deleteTahun('{{ $th->id }}')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

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
                $('#editTahun').on('show.bs.modal', function (e) {
                    const id = e.relatedTarget.id;
                    const url = '{{ route('admin.tahun.edit', ':param') }}'
                    const parsedUrl = url.replace(':param', id)
                    axios.get(parsedUrl)
                        .then(function(response) {
                            $('#idEdit').val(response.data.tahun.id)
                            $('#namaEdit').val(response.data.tahun.nama)
                            $('#awalEdit').val(response.data.tahun.awal.slice(0, 10))
                            $('#akhirEdit').val(response.data.tahun.akhir.slice(0, 10))
                        })
                        .catch(function (err) {
                            console.log(err.response.data)
                        })
                })
            });
            //Delete tahun
            function deleteTahun (id) {
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
                        axios.post('{{ route('admin.tahun.delete') }}', {
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
    <x-admin.tahun.create/>
    {{-- Edit --}}
    <x-admin.tahun.edit/>

</x-layouts.main>
