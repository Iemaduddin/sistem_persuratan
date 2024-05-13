<div class="modal fade text-left" id="viewDataDocument-<?php echo e($document->id); ?>-<?php echo e($no); ?>" tabindex="-1"
    role="dialog" aria-labelledby="modalViewDataDocument" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <?php if($no == 1): ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="modalViewDataDocument"><?php echo e($document->sender->name); ?>

                        (<?php echo e($document->event); ?>) </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="<?php echo e(asset('storage/' . $document->fileDocument)); ?>" width="100%"
                        height="600px"></iframe>
                </div>
            <?php elseif($no == 2): ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="modalViewDataDocument"><?php echo e($document->category); ?>

                        (<?php echo e($document->event); ?>) </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="<?php echo e(asset('storage/' . $document->fileDocument)); ?>" width="100%"
                        height="600px"></iframe>
                </div>
            <?php elseif($no == 3 || $no == 4): ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="modalViewDataDocument"><?php echo e($document->department->name); ?>

                        (<?php echo e($document->category); ?> <?php echo e($document->event); ?>) </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="<?php echo e(asset('storage/' . $document->fileDocument)); ?>" width="100%"
                        height="600px"></iframe>
                </div>
            <?php elseif($no == 5 || $no == 6): ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="modalViewDataDocument"><?php echo e($document->category); ?>

                        (<?php echo e($document->event); ?>)</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="<?php echo e(asset('storage/' . $document->fileDocument)); ?>" width="100%"
                        height="600px"></iframe>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH D:\STUDY\PROJECT\laragon\www\sistem_persuratan\resources\views/document/modal/view_document.blade.php ENDPATH**/ ?>