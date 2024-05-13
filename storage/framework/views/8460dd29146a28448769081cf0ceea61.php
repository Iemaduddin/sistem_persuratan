<div class="modal fade text-left" id="updateDataDocument-<?php echo e($document->id); ?>-<?php echo e($no); ?>" tabindex="-1"
    role="dialog" aria-labelledby="modalEditDocument" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalEditDocument">Edit Data Document</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
                use App\Models\Sender;
                use App\Models\Document;
                $lastSender = Sender::max('id');
                $allotments = Document::whereNotNull('allotment')->pluck('allotment')->unique();
                $eventCategories = Document::whereNotNull('eventCategory')->pluck('eventCategory')->unique();
            ?>
            <form action="<?php echo e(route('documents.update', $document->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-body">
                    <div class="row">
                        <?php if($no == 1): ?>
                            <div class="col">
                                <label>Kategori</label>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="category"
                                        value="<?php echo e($document->category); ?>" disabled>
                                    <input type="hidden" class="form-control" name="category"
                                        value="<?php echo e($document->category); ?>">
                                </div>
                                <label>Nomor Surat</label>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="no_surat"
                                        value="<?php echo e($document->no_surat); ?>" required>
                                </div>
                                <label>Pengirim</label>
                                <div class="form-group mb-3">
                                    <select name="sender_id" class="form-select"
                                        id="edit_sender_select_<?php echo e($document->id); ?>">
                                        <optgroup label="OKI"></optgroup>
                                        <?php $__currentLoopData = $sendersOki; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oki): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($oki->id); ?>"
                                                <?php echo e($document->sender_id == $oki->id ? 'selected' : ''); ?>>
                                                <?php echo e($oki->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <optgroup label="Naungan"></optgroup>
                                        <?php $__currentLoopData = $sendersNaungan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $naungan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($naungan->id); ?>"
                                                <?php echo e($document->sender_id == $naungan->id ? 'selected' : ''); ?>>
                                                <?php echo e($naungan->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <optgroup label="Others"></optgroup>
                                        <?php $__currentLoopData = $sendersOthers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($other->id); ?>"
                                                <?php echo e($document->sender_id == $other->id ? 'selected' : ''); ?>>
                                                <?php echo e($other->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lastSender + 1); ?>"
                                            <?php echo e($document->sender_id == $lastSender + 1 ? 'selected' : ''); ?>>
                                            Lainnya
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mb-3" id="edit_other_sender_input_<?php echo e($document->id); ?>"
                                    style="display: none;">
                                    <label for="edit_other_sender_<?php echo e($document->id); ?>" class="text-primary">*Masukkan
                                        Nama
                                        Pengirim Lainnya:</label>
                                    <input type="text" id="edit_other_sender_<?php echo e($document->id); ?>"
                                        name="other_sender" class="form-control">
                                </div>
                                <label>Event</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Event" class="form-control" name="event"
                                        value="<?php echo e($document->event); ?>" required>
                                </div>
                                <label>File Surat (<?php if($document->fileDocument): ?>
                                        <a href="<?php echo e(asset('storage/' . $document->fileDocument)); ?>"
                                            target="_blank">Lihat
                                            File</a>
                                    <?php endif; ?>)
                                </label>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control" name="fileDocument">
                                </div>
                            </div>
                        <?php elseif($no == 2): ?>
                            <div class="col">
                                <label>Kategori</label>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="category"
                                        value="<?php echo e($document->category); ?>" disabled>
                                    <input type="hidden" class="form-control" name="category"
                                        value="<?php echo e($document->category); ?>">
                                </div>
                                <label>Nomor Surat</label>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="no_surat"
                                        value="<?php echo e($document->no_surat); ?>" required>
                                </div>
                                <?php if($document->department_id != null): ?>
                                    <label>Departemen</label>
                                    <div class="form-group mb-3">
                                        <select name="department_id" class="form-select"
                                            id="edit_department_select_<?php echo e($document->id); ?>">
                                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($department->id); ?>"
                                                    <?php echo e($department->id === $document->department_id ? 'selected' : ''); ?>>
                                                    <?php echo e($department->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
                                <?php if($document->allotment != null): ?>
                                    <label>Peruntukkan</label>
                                    <div class="form-group mb-3">
                                        <select name="allotment" class="form-select"
                                            id="edit_allotment_select_<?php echo e($document->id); ?>">
                                            <option value="">Pilih Peruntukan</option>
                                            <?php $__currentLoopData = $allotments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allotment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($allotment); ?>"
                                                    <?php echo e($document->allotment === $allotment ? 'selected' : ''); ?>>
                                                    <?php echo e($allotment); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <option value="">Lainnya</option>
                                        </select>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group mb-3" id="edit_other_allotment_input_<?php echo e($document->id); ?>"
                                    style="display: none;">
                                    <label for="edit_other_allotment_<?php echo e($document->id); ?>"
                                        class="text-primary">*Masukkan
                                        Peruntukkan Lainnya:</label>
                                    <input type="text" id="edit_other_allotment_<?php echo e($document->id); ?>"
                                        name="other_allotment" class="form-control">
                                </div>
                                <?php if($document->eventCategory != null): ?>
                                    <label>Kategori Event</label>
                                    <div class="form-group mb-3">
                                        <select name="eventCategory" class="form-select"
                                            id="edit_eventCategory_select_<?php echo e($document->id); ?>">
                                            <option value="">Pilih Kategori Event</option>
                                            <?php $__currentLoopData = $eventCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($eventCategory); ?>"
                                                    <?php echo e($document->eventCategory === $eventCategory ? 'selected' : ''); ?>>
                                                    <?php echo e($eventCategory); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
                                <label>Event</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Event" class="form-control" name="event"
                                        value="<?php echo e($document->event); ?>">
                                </div>
                                <label>Description</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Description" class="form-control"
                                        name="description" value="<?php echo e($document->description); ?>">
                                </div>
                                <label>File Surat (<?php if($document->fileDocument): ?>
                                        <a href="<?php echo e(asset('storage/' . $document->fileDocument)); ?>"
                                            target="_blank">Lihat
                                            File</a>
                                    <?php endif; ?>)
                                </label>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control" name="fileDocument">
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col">
                                <label>Kategori</label>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" name="category"
                                        value="<?php echo e($document->category); ?>" disabled>
                                    <input type="hidden" class="form-control" name="category"
                                        value="<?php echo e($document->category); ?>">
                                </div>
                                <label>Departemen</label>
                                <div class="form-group mb-3">
                                    <select name="department_id" class="form-select">
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($department->id); ?>"
                                                <?php echo e($department->id === $document->department_id ? 'selected' : ''); ?>>
                                                <?php echo e($department->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <label>Event</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Event" class="form-control" name="event"
                                        value="<?php echo e($document->event); ?>" required>
                                </div>
                                <label>Description</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Description" class="form-control"
                                        name="description" value="<?php echo e($document->description); ?>">
                                </div>
                                <label>File Surat (<?php if($document->fileDocument): ?>
                                        <a href="<?php echo e(asset('storage/' . $document->fileDocument)); ?>"
                                            target="_blank">Lihat
                                            File</a>
                                    <?php endif; ?>)
                                </label>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control" name="fileDocument">
                                </div>
                            </div>
                        <?php endif; ?>
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
<?php if($no == 1): ?>
    <script>
        var editSenderSelect_<?php echo e($document->id); ?> = document.getElementById('edit_sender_select_<?php echo e($document->id); ?>');
        var editOtherSenderInput_<?php echo e($document->id); ?> = document.getElementById(
            'edit_other_sender_input_<?php echo e($document->id); ?>');

        editSenderSelect_<?php echo e($document->id); ?>.addEventListener('change', function() {
            if (editSenderSelect_<?php echo e($document->id); ?>.value === '<?php echo e($lastSender + 1); ?>') {
                editOtherSenderInput_<?php echo e($document->id); ?>.style.display = 'block';
            } else {
                editOtherSenderInput_<?php echo e($document->id); ?>.style.display = 'none';
            }
        });
    </script>
<?php elseif($no == 2): ?>
    <script>
        var editAllotmentSelect_<?php echo e($document->id); ?> = document.getElementById(
            'edit_allotment_select_<?php echo e($document->id); ?>');
        var editOtherAllotmentInput_<?php echo e($document->id); ?> = document.getElementById(
            'edit_other_allotment_input_<?php echo e($document->id); ?>');

        editAllotmentSelect_<?php echo e($document->id); ?>.addEventListener('change', function() {
            if (editAllotmentSelect_<?php echo e($document->id); ?>.value === '') {
                editOtherAllotmentInput_<?php echo e($document->id); ?>.style.display = 'block';
            } else {
                editOtherAllotmentInput_<?php echo e($document->id); ?>.style.display = 'none';
            }
        });
        editOtherAllotmentInput_<?php echo e($document->id); ?>.addEventListener('input', function() {
            editAllotmentSelect_<?php echo e($document->id); ?>.value = this.value;
        });
    </script>
<?php endif; ?>
<?php /**PATH D:\STUDY\PROJECT\laragon\www\sistem_persuratan\resources\views/document/modal/update_document.blade.php ENDPATH**/ ?>