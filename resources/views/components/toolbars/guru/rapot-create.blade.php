<div class="d-flex my-3 justify-content-between">
    <form class="row w-50" method="GET" action="{{ route('guru.rapot.create') }}" id="siswaByKelasFilterForm">
        <div class="col-md-4">
            <select name="kelasId" id="kelasId" class="form-select">
                <option value="" selected>--Kelas--</option>
                @foreach ($kelas as $kls)
                    <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
                @endforeach
            </select>
        </div>
    </form>
</div>
