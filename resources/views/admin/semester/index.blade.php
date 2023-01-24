<x-layouts.main>
    <x-slot:title>Semester</x-slot:title>
    <x-slot:subtitle>Pengelolaan Semster</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.admin.semester/>
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
        @if ($semester->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-striped mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Awal</th>
                            <th>Akhir</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($semester as $sm)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $sm->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($sm->awal)->format('d, M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($sm->akhir)->format('d, M Y') }}</td>
                                <td>
                                    @if($sm->aktif)
                                    <span class="badge bg-primary">Aktif</span>
                                    @else
                                    <a href="{{ route('admin.semester.toggle', $sm->id) }}">
                                        <span class="badge bg-danger">Nonaktif</span>
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Tahun Options">
                                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editSemester" id="{{ $sm->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger" onclick="deleteSemester('{{ $sm->id }}')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif ($semester->isEmpty() && request()->get('tahun') != '')
            <blockquote class="blockquote font-size-18">
                <h5>Tidak ada smester di Tahun Ajaran yang dipilih. Silakan input</h5>
            </blockquote>
        @elseif ($semester->isEmpty() && request()->get('tahun') == '')
            <blockquote class="blockquote font-size-18">
                <h5>Silakan pilih Tahun Ajaran</h5>
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
                $('#tahun').change(function (e) {
                    e.preventDefault();
                    if(e.target.value == '' || e.target.value == '{{ request()->get('tahun') }}'){
                        return;
                    }
                    $('#semesterFilterForm').submit();
                });
                //
                $('#editSemester').on('show.bs.modal', function (e) {
                    const id = e.relatedTarget.id;
                    const url = '{{ route('admin.semester.edit', ':param') }}'
                    const parsedUrl = url.replace(':param', id)

                    axios.get(parsedUrl)
                    .then(function (response) {
                        $('#idEdit').val(response.data.semester.id);
                        $('#tahunEdit').val(response.data.semester.tahun_id);
                        $('#namaEdit').val(response.data.semester.nama);
                        $('#awalEdit').val(response.data.semester.awal.slice(0, 10))
                        $('#akhirEdit').val(response.data.semester.akhir.slice(0, 10))
                        // console.log(new Date(response.data.semester.awal).toISOString().split('T')[0])
                    })
                })
            });
            //Delete semester
            function deleteSemester (id) {
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
                        axios.post('{{ route('admin.semester.delete') }}', {
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
    <x-admin.semester.create/>
    {{-- Edit --}}
    <x-admin.semester.edit/>
</x-layouts.main>
