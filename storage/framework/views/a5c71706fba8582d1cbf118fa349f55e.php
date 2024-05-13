
<?php $__env->startSection('title'); ?>
    User Management
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
            Pages
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            User Management
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <!-- Dropdown untuk Tambah Data -->
                    <div class="btn-group gap-2 ">
                        <button class="btn btn-success btn-md rounded fw-bold text-white" type="button"
                            data-bs-toggle="modal" data-bs-target="#tambahUser">
                            <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Data
                        </button>
                    </div>
                </div>
                <?php echo $__env->make('admin.modal.tambah_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card-body">
                    <table id="datatable" class="table dt-responsive  w-100">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    NIF
                                </th>
                                <th>
                                    NIM
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    TTL
                                </th>
                                <th>
                                    JK
                                </th>
                                <th>
                                    Prodi
                                </th>
                                <th>
                                    Departemen
                                </th>
                                <th>
                                    No. HP
                                </th>
                                <th>
                                    Keaktifan
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <?php echo e($loop->iteration); ?>

                                    </td>
                                    <?php if($user->role_id == 1): ?>
                                        <td><span class="badge bg-dark">Admin</span></td>
                                    <?php elseif($user->role_id == 2): ?>
                                        <td><?php echo e($user->nif); ?></td>
                                    <?php elseif($user->role_id == 3): ?>
                                        <td><span class="badge bg-info">OC</span></td>
                                    <?php endif; ?>
                                    <td>
                                        <?php echo e($user->nim); ?>

                                    </td>
                                    <td>
                                        <?php echo e($user->username); ?>

                                    </td>
                                    <td>
                                        <?php echo e($user->email); ?>

                                    </td>
                                    <?php if($user->tempat_lahir && $user->tanggal_lahir): ?>
                                        <td>
                                            <?php echo e($user->tempat_lahir); ?>,
                                            <?php echo e($user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('j-M-Y') : null); ?>

                                        </td>
                                    <?php else: ?>
                                        <td>-</td>
                                    <?php endif; ?>
                                    <td>
                                        <?php echo e($user->jk); ?>

                                    </td>
                                    <td>
                                        <?php echo e($user->prodi); ?>

                                    </td>
                                    <td>
                                        <?php echo e($user->department); ?>

                                    </td>
                                    <td>
                                        <?php echo e($user->no_hp); ?>

                                    </td>
                                    <td>
                                        <span
                                            class="badge <?php echo e($user->status_keaktifan == 'Aktif' ? 'bg-primary' : 'bg-secondary'); ?>"
                                            style="width: 40px"><?php echo e($user->status_keaktifan); ?></span>
                                    </td>
                                    <td>
                                        <?php if(Cache::has('user-online' . $user->id)): ?>
                                            <span class="badge bg-success">Online</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Offline</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="align-middle p-2">
                                        <div class="btn-group gap-2">
                                            <button class="btn btn-outline-primary btn-md rounded-2" data-bs-toggle="modal"
                                                data-bs-target="#updateDataUser-<?php echo e($user->id); ?>"><i
                                                    class="fas fa-edit"></i></button>
                                            <?php echo $__env->make('admin.modal.update_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php if($user->role->name != 'Admin'): ?>
                                                <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST">
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
                        <tfoot>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    NIF
                                </th>
                                <th>
                                    NIM
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    TTL
                                </th>
                                <th>
                                    JK
                                </th>
                                <th>
                                    Prodi
                                </th>
                                <th>
                                    Departemen
                                </th>
                                <th>
                                    No. HP
                                </th>
                                <th>
                                    Keaktifan
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action</th>
                            </tr>
                        </tfoot>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\STUDY\PROJECT\laragon\www\sistem_persuratan\resources\views/admin/user-management.blade.php ENDPATH**/ ?>