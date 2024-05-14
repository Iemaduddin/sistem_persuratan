<div class="modal fade text-left" id="tambahOki" tabindex="-1" role="dialog" aria-labelledby="modalTambahOki"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTambahOki">Tambah Data Pengirim</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('senders.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label>Pengirim</label>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Pengirim" class="form-control" name="name"
                                    required>
                                <input type="hidden" class="form-control" name="scope" value="Oki">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH D:\STUDY\PROJECT\laragon\www\sistem_persuratan\resources\views/admin/senders/modal/tambah_oki.blade.php ENDPATH**/ ?>