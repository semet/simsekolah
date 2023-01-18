<x-layouts.main>
    <x-slot:title>Jadwal</x-slot:title>
    <x-slot:subtitle>Lihat Jadwal Mengajar</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.guru.jadwal/>
    {{-- Card --}}
    <x-ui.card>
        @if ($jadwal->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-striped mb-0">

                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Mata Pelajaran</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $jd)
                            <tr>
                                <th scope="row">{{ $jd->kelas->nama }}</th>
                                <td>{{ $jd->hari }}</td>
                                <td>{{ $jd->awal }}</td>
                                <td>{{ $jd->guru->mapel->nama }}</td>
                                <td>@mdo</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif ($jadwal->isEmpty() && request()->get('kelas') != '')
            <blockquote class="blockquote font-size-18">
                <h5>Tidak ada Jadwal di Kelas dan Hari yang dipilih.</h5>
            </blockquote>
        @elseif ($jadwal->isEmpty() && request()->get('kelas') == '')
            <blockquote class="blockquote font-size-18">
                <h5>Silakan pilih Kelas</h5>
            </blockquote>
        @endif
    </x-ui.card>

    @push('styles')

    @endpush

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#hari').change(function (e) {
                    e.preventDefault();
                    $('#jadwalFilterForm').submit();
                });
            });
        </script>
    @endpush
</x-layouts.main>
