
<?php $__env->startSection('title'); ?>
    Proposal HMTI
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css')); ?>"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css')); ?>"
        rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet ">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Dokumen
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Proposal HMTI
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php
        use App\Models\Department;
        $no = 3;
        $departments = Department::all()->skip(1);
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <!-- Dropdown untuk Tambah Data -->
                    <div class="btn-group gap-2 ">
                        <button class="btn btn-success btn-md rounded fw-bold text-white" type="button"
                            data-bs-toggle="modal" data-bs-target="#tambahDocument-<?php echo e($no); ?>">
                            <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Data
                        </button>
                    </div>
                </div>
                <?php echo $__env->make('document.modal.tambah_document', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card-body">
                    <table id="datatable" class="table dt-responsive  w-100">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Kategori Proposal
                                </th>
                                <th>
                                    Departemen
                                </th>
                                <th>
                                    Program Kerja
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Tanggal
                                </th>
                                <th>
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $proposalHmti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <?php echo e($loop->iteration); ?>

                                    </td>
                                    <td>
                                        <span
                                            class="badge <?php echo e($document->category == 'Proposal AA' ? 'bg-info' : 'bg-warning'); ?>">
                                            <?php echo e($document->category); ?></span>
                                    </td>
                                    <td>
                                        <?php echo e(optional($document->department)->name ?? ''); ?>

                                    </td>
                                    <td>
                                        <?php echo e($document->event); ?>

                                    </td>
                                    <td>
                                        <?php echo e($document->description); ?>

                                    </td>
                                    <td>
                                        <?php echo e(\Carbon\Carbon::parse($document->created_at)->format('j-M-Y')); ?>

                                    </td>
                                    <td class="align-middle p-2">
                                        <div class="btn-group gap-2">
                                            <button class="btn btn-outline-secondary btn-md rounded-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#viewDataDocument-<?php echo e($document->id); ?>-<?php echo e($no); ?>"><i
                                                    class="far fa-eye"></i></button>
                                            <?php echo $__env->make('document.modal.view_document', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <button class="btn btn-outline-primary btn-md rounded-2" data-bs-toggle="modal"
                                                data-bs-target="#updateDataDocument-<?php echo e($document->id); ?>-<?php echo e($no); ?>"><i
                                                    class="fas fa-edit"></i></button>
                                            <?php echo $__env->make('document.modal.update_document', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php if(Auth::user()->role_id !== 3): ?>
                                                <form action="<?php echo e(route('documents.destroy', $document->id)); ?>"
                                                    method="POST">
                                                    <?php echo method_field('DELETE'); ?>
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit"
                                                        class="btn btn-outline-danger btn-md rounded-2 confirm-delete"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end cardaa -->
        </div> <!-- end col -->
    </div> <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net/datatables.net.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons/datatables.net-buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.js')); ?>">
    </script>
    <script src="<?php echo e(URL::asset('assets/js/pages/datatables.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\STUDY\PROJECT\laragon\www\sistem_persuratan\resources\views/document/proposal/proposalHmti-management.blade.php ENDPATH**/ ?>