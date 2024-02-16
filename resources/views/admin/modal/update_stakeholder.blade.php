<div class="modal fade text-left" id="updateDataStakeholder-{{ $stakeholder->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalUpdateDataStakeholder" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalUpdateDataStakeholder">Update Data OC</h4>
                <i class="fa fa-times close cursor-pointer" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <form action="{{ route('stakeholder.update', $stakeholder->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body text-start">
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($stakeholder->nip != null)
                                <label>NIP</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nip"
                                        value="{{ $stakeholder->nip }}" required>
                                </div>
                            @elseif($stakeholder->nim != null)
                                <label>NIM</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nim"
                                        value="{{ $stakeholder->nim }}" required>
                                </div>
                            @endif
                            <label>Nama Lengkap</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama"
                                    value="{{ $stakeholder->nama }}" required>
                            </div>
                        </div>
                        <label>Jabatan</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="jabatan"
                                value="{{ $stakeholder->jabatan }}" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
