<div class="d-flex my-3 justify-content-between">
    <form class="row w-50" method="GET" action="{{ route('guru.rapot') }}" id="rapotFilterForm">
        <div class="col-md-2">
            <select name="tahunId" id="tahunId" class="form-select">
                <option value="" selected>--Tahun--</option>
                @foreach ($tahun as $th)
                    <option value="{{ $th->id }}" @selected(request()->get('tahunId') == $th->id)>{{ $th->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select name="semesterId" id="semesterId" class="form-select" disabled>
                <option value="" selected>--Semester--</option>
            </select>
        </div>
        <div class="col-md-4">
            <select name="kelasId" id="kelasId" class="form-select" disabled>
                <option value="" selected>--Kelas--</option>
                @foreach ($kelas as $kls)
                    <option value="{{ $kls->id }}" @selected(request()->get('kelasId') == $kls->id)>{{ $kls->nama }}</option>
                @endforeach
            </select>
        </div>
    </form>
    <div class="d-flex justify-content-end gap-2">
        <a class="btn btn-success rounded rounded-circle" href="{{ route('guru.rapot.export-excel', ['tahunId' => request()->get('tahunId'), 'semesterId' => request()->get('semesterId'), 'kelasId' => request()->get('kelasId')]) }}">
            <i class="fas fa-file-excel"></i>
        </a>
        <a class="btn btn-danger rounded rounded-circle" href="{{ route('guru.rapot.export-pdf', ['tahunId' => request()->get('tahunId'), 'semesterId' => request()->get('semesterId'), 'kelasId' => request()->get('kelasId')]) }}">
            <i class="fas fa-file-pdf rounded rounded-circle"></i>
        </a>
        <button class="btn btn-secondary rounded rounded-circle">
            <i class="fas fa-print"></i>
        </button>
    </div>
</div>
