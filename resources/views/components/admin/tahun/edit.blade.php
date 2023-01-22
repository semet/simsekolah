<div id="editTahun" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content needs-validation" method="POST" action="{{ route('admin.tahun.update') }}" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Input Data Tahun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @csrf

                <input type="hidden" name="idEdit" id="idEdit">

                <div class="mb-3">
                    <label for="namaEdit" class="form-label">Tahun Ajaran</label>
                    <input type="text" class="form-control" name="namaEdit" id="namaEdit" required/>
                    <div class="invalid-feedback">
                        Tahun Ajaran harus diisi
                    </div>
                </div>

                <div class="mb-3">
                    <label for="awalEdit" class="form-label">Awal</label>
                    <input type="date" class="form-control" name="awalEdit" id="awalEdit" required>
                    <div class="invalid-feedback">
                        Tanggal Awal harus diisi
                    </div>
                </div>

                <div class="mb-3">
                    <label for="akhirEdit" class="form-label">Akhir</label>
                    <input type="date" class="form-control" name="akhirEdit" id="akhirEdit" required>
                    <div class="invalid-feedback">
                        Tanggal Akhir harus diisi
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
