<div class="d-flex mb-3 justify-content-between">
    <form class="w-25" method="GET" action="{{ route('admin.semester') }}" id="semesterFilterForm">
        <select name="tahun" id="tahun" class="form-select">
            <option value="" selected>--Pilih Tahun Ajaran--</option>
            @foreach ($tahun as $th)
                <option value="{{ $th->id }}" @selected(request()->get('tahun') == $th->id)>{{ $th->nama }}</option>
            @endforeach
        </select>
    </form>
    <div class="d-flex justify-content-end gap-2">
        <button class="btn btn-primary rounded rounded-circle" data-bs-toggle="modal" data-bs-target="#createSemester">
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
