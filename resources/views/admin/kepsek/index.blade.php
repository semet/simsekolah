<x-layouts.main>
    <x-slot:title>Kepala Sekolah</x-slot:title>
    <x-slot:subtitle>Kelola Data Kepala Sekolah</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.admin.kepala-sekolah/>
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
                        <th>NIP</th>
                        <th>Nama Lengkap</th>
                        <th>Departemen</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kepsek as $kep)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $kep->nip }}</td>
                            <td>{{ $kep->nama }}</td>
                            <td>{{ $kep->departemen->nama }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Kepsek Options">
                                    <a class="btn btn-info" href="{{ route('admin.kepsek.edit', $kep) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger" onclick="deleteKepsek('{{ $kep->id }}')">
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
        <script src="{{ asset('assets/libs/axios/axios.min.js') }}"></script>
        <script>
            function deleteKepsek (id) {
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
                        axios.post('{{ route('admin.kepsek.delete') }}', {
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
</x-layouts.main>
