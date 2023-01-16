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

    <x-admin.departemen.create/>

</x-layouts.main>
