<div class="d-flex my-3 justify-content-between">
    <form class="row w-50" method="GET" action="{{ route('guru.jadwal') }}" id="jadwalFilterForm">
        <div class="col-md-2">
            <select name="kelas" id="kelas" class="form-select">
                <option value="" selected>--Kelas--</option>
                @foreach ($kelas as $kls)
                    <option value="{{ $kls->id }}" @selected(request()->get('kelas') == $kls->id)>{{ $kls->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
           <x-input.select-day/>
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
