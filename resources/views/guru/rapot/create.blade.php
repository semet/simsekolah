<x-layouts.main>
    <x-slot:title>Jadwal</x-slot:title>
    <x-slot:subtitle>Lihat Jadwal Mengajar</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.guru.rapot-create/>
    {{-- Card --}}
    <x-ui.card>
        @if ($siswa->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-striped mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Nilai</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $sis)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $sis->nisn }}</td>
                                <td>{{ $sis->nama }}</td>
                                <td style="width: 200px">
                                    <input type="text" class="form-control form-control-sm" id="{{ $sis->id }}" onblur="handleChange('{{ $sis->id }}')">
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm" id="{{ $sis->nisn }}" onclick="saveNilai('{{ $sis->id }}', '{{ $sis->nisn }}')">Save</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif ($siswa->isEmpty() && request()->get('kelasId') != '' )
            <blockquote class="blockquote font-size-18">
                <h5>Tidak ada Siswa di Kelas yang dipilih. Atau Kemungkinan anda telah mengisi nilai untuk kelas ini di tahun dan semester yang sedang aktif.</h5>
            </blockquote>
        @elseif ($siswa->isEmpty() && request()->get('kelasId') == '' )
            <blockquote class="blockquote font-size-18">
                <h5>Silakan pilih Kelas</h5>
            </blockquote>
        @endif
    </x-ui.card>

    @push('styles')

    @endpush

    @push('scripts')
        <script src="{{ asset('assets/libs/axios/axios.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#kelasId').change(function (e) {
                    e.preventDefault();

                    if(e.target.value == '' || e.target.value == '{{ request()->get('kelasId') }}'){
                        return;
                    }

                    $('#siswaByKelasFilterForm').submit();
                });
                //
            });

            //Listen to input change

            function handleChange (e) {
                var element = document.getElementById(e)
                if(element.value != '') {
                    element.classList.remove('is-invalid');
                    element.classList.add('is-valid');
                }else{
                    element.classList.remove('is-valid');
                    element.classList.add('is-invalid');
                    return false;
                }
            }

            // Save Nilai

            function saveNilai (id, nisn) {
                var inputNilai = document.getElementById(id)

                if(inputNilai.value == '') {
                    inputNilai.classList.add('is-invalid');
                    return
                }

                axios.post('{{ route('guru.rapot.store') }}', {
                    _token: '{{ csrf_token() }}',
                    kelasId: '{{ request()->get('kelasId') }}',
                    siswaId: id,
                    nilai: inputNilai.value
                })
                .then(function(response) {
                    if(response.status === 201) {
                        $(inputNilai).attr('readonly', true);
                        $(`#${nisn}`).attr('disabled', true);
                    }
                })
            }
        </script>
    @endpush
</x-layouts.main>
