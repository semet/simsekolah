<x-layouts.main>
    <x-slot:title>Tingkat</x-slot:title>
    <x-slot:subtitle>Pengelolaan Tingkat</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.admin.tingkat/>
    {{-- Card --}}
    <x-ui.card width="6" class="mx-auto">
        @if(session('message'))
            <div class="py-3">
                <x-ui.alert type="success" message="{{ session('message') }}" />
            </div>
        @elseif(session('error'))
            <div class="py-3">
                <x-ui.alert type="danger" message="{{ session('error') }}" />
            </div>
        @endif

        @if ($tingkat->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-striped mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th class="d-flex justify-content-end">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tingkat as $tn)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $tn->nama }}</td>
                                <td class="d-flex justify-content-end">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Tahun Options">
                                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editTingkat" id="{{ $tn->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger" onclick="deleteTingkat('{{ $tn->id }}')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif ($tingkat->isEmpty() && request()->get('departemen') != '')
            <blockquote class="blockquote font-size-18">
                <h5>Tidak ada Tingkat di Departemen yang dipilih. Silakan input</h5>
            </blockquote>
        @elseif ($tingkat->isEmpty() && request()->get('departemen') == '')
            <blockquote class="blockquote font-size-18">
                <h5>Silakan pilih Departemen</h5>
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
                $('#departemen').change(function (e) {
                    e.preventDefault();
                    if(e.target.value == '' || e.target.value == '{{ request()->get('departemen') }}'){
                        return;
                    }
                    $('#tingkatFilterForm').submit();
                });
                //
                $('#editTingkat').on('show.bs.modal', function (e) {
                    const id = e.relatedTarget.id;
                    const url = '{{ route('admin.tingkat.edit', ':param') }}'
                    const parsedUrl = url.replace(':param', id)

                    axios.get(parsedUrl)
                    .then(function (response) {
                        $('#idEdit').val(response.data.tingkat.id);
                        $('#departemenIdEdit').val(response.data.tingkat.departemen_id);
                        $('#namaEdit').val(response.data.tingkat.nama);
                    }).then(function () {
                        console.log($('#departemenIdEdit').val())
                    })
                })
            });
            //Delete tingkat
            function deleteTingkat (id) {
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
                        axios.post('{{ route('admin.tingkat.delete') }}', {
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
    <x-admin.tingkat.create :departemen="$departemen"/>
    {{-- Edit --}}
    <x-admin.tingkat.edit :departemen="$departemen"/>

</x-layouts.main>
