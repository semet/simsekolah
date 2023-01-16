<div id="createSemester" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content needs-validation" action="{{ route('admin.semester.store') }}" method="POST" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Input Data Semester</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @csrf

                <div class="mb-3">
                    <label for="tahunId" class="form-label">Tahun Ajaran</label>
                    <select name="tahunId" id="tahunId" class="form-select" required>
                        <option value="" selected>--Pilih Tahun Ajaran--</option>
                        @foreach ($tahun as $th)
                            <option value="{{ $th->id }}">{{ $th->nama }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Tahun Ajaran harus diisi
                    </div>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Semester</label>
                    <select name="nama" id="nama" class="form-select" required>
                        <option value="" selected>--Nama Semester--</option>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                    <div class="invalid-feedback">
                        Nama Semester harus diisi
                    </div>
                </div>

                <div class="mb-3">
                    <label for="awal" class="form-label">Awal</label>
                    <input type="date" class="form-control" name="awal" id="awal" required>
                    <div class="invalid-feedback">
                        Tanggal Awal harus diisi
                    </div>
                </div>

                <div class="mb-3">
                    <label for="akhir" class="form-label">Akhir</label>
                    <input type="date" class="form-control" name="akhir" id="akhir" required>
                    <div class="invalid-feedback">
                        Tanggal Akhir harus diisi
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-label">Status</div>
                    <input class="form-check form-switch" type="checkbox" id="aktif" switch="none" name="status">
                    <label class="form-label" for="aktif" data-on-label="Aktif" data-off-label="No"></label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
            </div>
        </form>

    </div>

</div>
