<div class="d-flex mb-3 justify-content-between">
    <form class="row w-100" method="GET" action="{{ route('admin.siswa') }}" id="siswaFilterForm">
        <div class="col-md-3">
            <select name="departemen" id="departemen" class="form-select">
                <option value="" selected>--Pilih Departemen--</option>
                @foreach ($departemen as $dep)
                    <option value="{{ $dep->id }}">{{ $dep->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <select name="tingkat" id="tingkat" class="form-select">
                <option value="" selected>--Pilih Tingkat--</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="kelas" id="kelas" class="form-select">
                <option value="" selected>--Pilih Kelas--</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="tahun" id="tahun" class="form-select">
                <option value="" selected>--Pilih Tahun--</option>
                @foreach($tahun as $th)
                    <option value="{{ $th->id }}">{{ $th->nama }}</option>
                @endforeach
            </select>
        </div>
    </form>
    <div class="d-flex w-25 justify-content-end gap-2">
        <button class="btn btn-primary rounded rounded-circle">
            <i class="fas fa-plus"></i>
        </button>
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
