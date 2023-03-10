<div class="d-flex mb-3 justify-content-between">
    <form class="row w-50" method="GET" action="{{ route('admin.guru') }}" id="guruFilterForm">
        <div class="col-md-4">
            <select name="departemen" id="departemen" class="form-select">
                <option value="" selected>--Pilih Departemen--</option>
                @foreach ($departemen as $dep)
                    <option value="{{ $dep->id }}">{{ $dep->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select name="tingkat" id="tingkat" class="form-select">
                <option value="" selected>--Pilih Tingkat--</option>
            </select>
        </div>
    </form>
    <div class="d-flex justify-content-end gap-2">
        <a class="btn btn-primary rounded rounded-circle" href="{{ route('admin.guru.create') }}">
            <i class="fas fa-plus"></i>
        </a>
        <a class="btn btn-success rounded rounded-circle" href="{{ route('admin.guru.export.excel', ['departemenId' => request()->get('departemen'), 'tingkatId' => request()->get('tingkat')]) }}">
            <i class="fas fa-file-excel"></i>
        </a>
        <button class="btn btn-danger rounded rounded-circle">
            <i class="fas fa-file-pdf rounded rounded-circle"></i>
        </button>
        <a class="btn btn-secondary rounded rounded-circle" href="{{ route('admin.guru.export.print', ['departemenId' => request()->get('departemen'), 'tingkatId' => request()->get('tingkat')]) }}">
            <i class="fas fa-print"></i>
        </a>
    </div>
</div>
