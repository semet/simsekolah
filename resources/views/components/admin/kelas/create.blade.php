<div id="createKelas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content needs-validation" action="{{ route('admin.kelas.store') }}" method="POST" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Input Data Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @csrf

                <div class="mb-3">
                    <label for="departemenId" class="form-label">Departemen</label>
                    <select name="departemenId" id="departemenId" class="form-select" required>
                        <option value="" selected>--Pilih Departemen--</option>
                        @foreach ($departemen as $dep)
                            <option value="{{ $dep->id }}">{{ $dep->nama }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Departemen harus diisi
                    </div>
                </div><div class="mb-3">
                    <label for="tingkatId" class="form-label">Tingkat</label>
                    <select name="tingkatId" id="tingkatId" class="form-select" required>
                        <option value="" selected>--Pilih Tingkat--</option>
                    </select>
                    <div class="invalid-feedback">
                        Tingkat harus diisi
                    </div>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                    <div class="invalid-feedback">
                        Nama Kelas harus diisi
                    </div>
                </div>

                <div class="mb-3">
                    <label for="kapasitas" class="form-label">Kapasitas</label>
                    <input type="number" class="form-control" name="kapasitas" id="kapasitas" value="25" required>
                    <div class="invalid-feedback">
                        Kapasitas harus diisi
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
            </div>
        </form>

    </div>

</div>
