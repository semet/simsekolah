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
        <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
    @endpush

    <x-admin.tahun.create/>

</x-layouts.main>
