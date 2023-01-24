<div id="editTingkat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form class="modal-content needs-validation" action="{{ route('admin.tingkat.update') }}" method="POST" novalidate>
            <div class="modal-header">
                <h5 class="modal-title" id="modalEdit">Input Data Tingkat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @csrf

                <input type="hidden" name="idEdit" id="idEdit">

                <div class="mb-3">
                    <label for="departemenIdEdit" class="form-label">Departemen </label>
                    <select name="departemenIdEdit" id="departemenIdEdit" class="form-select" required>
                        <option value="">--Pilih Departemen--</option>
                        @foreach ($departemen as $dep)
                            <option value="{{ $dep->id }}" @selected(request()->get('departemen') == $dep->id)>{{ $dep->nama }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Departemen harus diisi
                    </div>
                </div>

                <div class="mb-3">
                    <label for="namaEdit" class="form-label">Nama Tingkat</label>
                    <input type="text" class="form-control" name="namaEdit" id="namaEdit" required>
                    <div class="invalid-feedback">
                        Nama Tingkat harus diisi
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
