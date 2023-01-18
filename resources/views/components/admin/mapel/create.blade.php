<div id="createMapel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content needs-validation" action="{{ route('admin.mapel.store') }}" method="POST" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Input Data Mata Pelajaran</h5>
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
                    <label for="kode" class="form-label">Kode Mata Pelajaran</label>
                    <input type="text" class="form-control" name="kode" id="kode" required>
                    <div class="invalid-feedback">
                        Kode Mata Pelajaran harus diisi
                    </div>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mata Pelajaran</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                    <div class="invalid-feedback">
                        Nama Mata Pelajaran Kelas harus diisi
                    </div>
                </div>

                <div class="mb-3">
                    <label for="durasi" class="form-label">Alokasi Waktu (jam)</label>
                    <input type="number" class="form-control" name="durasi" id="durasi" value="6" required>
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
