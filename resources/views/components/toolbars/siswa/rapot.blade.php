<div class="d-flex my-3 justify-content-between">
    <form class="row w-50" method="GET" action="{{ route('siswa.rapot') }}" id="rapotFilterForm">
        <div class="col-md-2">
            <select name="tahun" id="tahun" class="form-select">
                <option value="" selected>--Tahun--</option>
                @foreach ($tahun as $th)
                    <option value="{{ $th->id }}">{{ $th->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select name="semester" id="semester" class="form-select" disabled>
                <option value="" selected></option>
            </select>
        </div>
    </form>
    <div class="d-flex justify-content-end gap-2">
        <button class="btn btn-success rounded rounded-circle">
            <i class="fas fa-file-excel"></i>
        </button>
        <button class="btn btn-danger rounded rounded-circle">
            <i class="fas fa-file-pdf rounded rounded-circle"></i>
        </button>
        <button class="btn btn-secondary rounded rounded-circle">
            <i class="fas fa-print"></i>
        </button>
    </div>
</div>
