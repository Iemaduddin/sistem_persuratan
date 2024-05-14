<div class="modal fade text-left" id="updateDataSender-<?php echo e($sender->id); ?>" tabindex="-1" role="dialog"
    aria-labelledby="modalUpdateDataSender" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalUpdateDataSender">Update Data Pengirim</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('senders.update', $sender->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label>Nama Departemen</label>
                            <div class="form-group mb-3 mt-2">
                                <input type="text" placeholder="Pengirim" class="form-control" name="name"
                                    value="<?php echo e($sender->name); ?>" required>
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
<?php /**PATH D:\STUDY\PROJECT\laragon\www\sistem_persuratan\resources\views/admin/senders/modal/update_others.blade.php ENDPATH**/ ?>