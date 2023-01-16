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
                            <td>@mdo</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </x-ui.card>

    @push('styles')

    @endpush

    @push('scripts')

    @endpush
</x-layouts.main>
