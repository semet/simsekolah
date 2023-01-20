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
        <div class="col md-6">
            <input type="text" class="form-control" placeholder="Search by NIP ">
        </div>
    </form>
    <div class="d-flex justify-content-end gap-2">
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
