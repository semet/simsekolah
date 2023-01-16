<x-layouts.main>
    <x-slot:title>Tingkat</x-slot:title>
    <x-slot:subtitle>Pengelolaan Tingkat</x-slot:subtitle>
    {{-- Toolbars --}}
    <x-toolbars.admin.tingkat/>
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

        @if ($tingkat->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-striped mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tingkat as $tn)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $tn->nama }}</td>
                                <td>@mdo</td>
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

    @endpush

    @push('scripts')
        <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>

        <script>
            $(document).ready(function () {
                $('#departemen').change(function (e) {
                    e.preventDefault();
                    if(e.target.value == '' || e.target.value == '{{ request()->get('departemen') }}'){
                        return;
                    }
                    $('#tingkatFilterForm').submit();
                });
            });
        </script>
    @endpush

    <x-admin.tingkat.create/>

</x-layouts.main>
