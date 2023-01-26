<div id="editMapel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content needs-validation" action="{{ route('admin.mapel.update') }}" method="POST" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Input Data Mata Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @csrf

                <input type="hidden" name="idEdit" id="idEdit">

                <div class="mb-3">
                    <label for="departemenIdEdit" class="form-label">Departemen</label>
                    <select name="departemenIdEdit" id="departemenIdEdit" class="form-select" required>
                        <option value="" selected>--Pilih Departemen--</option>
                        @foreach ($departemen as $dep)
                            <option value="{{ $dep->id }}">{{ $dep->nama }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Departemen harus diisi
                    </div>
                </div><div class="mb-3">
                    <label for="tingkatIdEdit" class="form-label">Tingkat</label>
                    <select name="tingkatIdEdit" id="tingkatIdEdit" class="form-select" required>
                        <option value="" selected></option>
                    </select>
                    <div class="invalid-feedback">
                        Tingkat harus diisi
                    </div>
                </div>

                <div class="mb-3">
                    <label for="kodeEdit" class="form-label">Kode Mata Pelajaran</label>
                    <input type="text" class="form-control" name="kodeEdit" id="kodeEdit" required>
                    <div class="invalid-feedback">
                        Kode Mata Pelajaran harus diisi
                    </div>
                </div>

                <div class="mb-3">
                    <label for="namaEdit" class="form-label">Nama Mata Pelajaran</label>
                    <input type="text" class="form-control" name="namaEdit" id="namaEdit" required>
                    <div class="invalid-feedback">
                        Nama Mata Pelajaran Kelas harus diisi
                    </div>
                </div>

                <div class="mb-3">
                    <label for="durasiEdit" class="form-label">Alokasi Waktu (jam)</label>
                    <input type="number" class="form-control" name="durasiEdit" id="durasiEdit" value="6" required>
                    <div class="invalid-feedback">
                        Alokasi Waktu harus diisi
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
