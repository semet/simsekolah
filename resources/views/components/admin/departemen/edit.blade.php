<div id="editDepartemen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content needs-validation" method="POST" action="{{ route('admin.departemen.update') }}" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Data Departemen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @csrf
                <input type="hidden" name="departemenIdEdit" id="departemenIdEdit">
                <div class="mb-3">
                    <label for="namaDepartemenEdit" class="form-label">Nama Departemen</label>
                    <input type="text" class="form-control" name="namaDepartemenEdit" id="namaDepartemenEdit" required/>
                    <div class="invalid-feedback">
                        Nama Departemen harus diisi
                    </div>
                </div>
                <div class="mb-3">
                    <label for="keteranganEdit" class="form-label">Keterangan</label>
                    <textarea class="form-control" name="keteranganEdit" id="keteranganEdit"></textarea>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
            </div>
        </form>

    </div>

</div>
