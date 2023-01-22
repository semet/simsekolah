<x-layouts.main>
    <x-slot:title>Departemen</x-slot:title>
    <x-slot:subtitle>Pengelolaan Departemen</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.admin.home/>
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
                        <th>Nama Departemen</th>
                        <th>Keterangan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departemen as $dep)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $dep->nama }}</td>
                            <td>{{ $dep->keterangan }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Departemen Options">
                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editDepartemen" id="{{ $dep->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger" onclick="deleteDepartemen('{{ $dep->id }}')">
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
                $('#editDepartemen').on('show.bs.modal', function (e) {
                    const id = e.relatedTarget.id;
                    const url = '{{ route('admin.departemen.edit', ':param') }}'
                    const parsedUrl = url.replace(':param', id)
                    axios.get(parsedUrl)
                        .then(function(response) {
                            console.log(response.data.departemen.id)
                            $('#namaDepartemenEdit').val(response.data.departemen.nama)
                            $('#keteranganEdit').val(response.data.departemen.keterangan)
                            $('#departemenIdEdit').val(response.data.departemen.id)
                        })
                        .catch(function (err) {
                            console.log(err.response.data)
                        })
                })
            })
            // Delete departemen
            function deleteDepartemen (id) {
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
                        axios.post('{{ route('admin.departemen.delete') }}', {
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
    {{--Create--}}
    <x-admin.departemen.create/>
    {{--Edit--}}
    <x-admin.departemen.edit/>

</x-layouts.main>
