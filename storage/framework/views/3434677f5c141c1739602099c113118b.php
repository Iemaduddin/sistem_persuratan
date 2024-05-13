<div class="modal fade text-left" id="updateDataUser-<?php echo e($user->id); ?>" tabindex="-1" role="dialog"
    aria-labelledby="modalUpdateDataUser" aria-hidden="true">
    <div class="modal-dialog <?php echo e($user->role->name != 'Admin' ? 'modal-lg' : ''); ?>  modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalUpdateDataUser">Update Data User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-body">
                    <div class="row">
                        <?php if($user->role->name == 'Admin'): ?>
                            <div class="col">
                                <label>Email</label>
                                <div class="form-group mb-3">
                                    <input type="email" placeholder="Email" class="form-control" name="email"
                                        value="<?php echo e($user->email); ?>" required>
                                </div>
                                <label>Username</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Username" class="form-control" name="username"
                                        value="<?php echo e($user->username); ?>" required>
                                </div>
                                <label>Password</label>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <input type="password" placeholder="Password" class="form-control"
                                            name="password" id="updatePasswordUser-<?php echo e($user->id); ?>">
                                        <span class="input-group-text show-password-toggle"
                                            id="showPasswordToggle-<?php echo e($user->id); ?>">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="role_id" value="<?php echo e($user->role_id); ?>">
                            </div>
                        <?php else: ?>
                            <div class="col-sm-4">
                                <label>Role</label>
                                <div class="form-group mb-3">
                                    <select name="role_id" id="roleUpdate<?php echo e($user->id); ?>" class="form-select"
                                        required>
                                        <option value="2" <?php echo e($user->role_id == 2 ? 'selected' : ''); ?>>Sekretaris
                                            Umum
                                        </option>
                                        <option value="3" <?php echo e($user->role_id == 3 ? 'selected' : ''); ?>>OC
                                        </option>
                                    </select>
                                </div>
                                <div id="nifUpdate<?php echo e($user->id); ?>">
                                    <label>NIF</label>
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="NIF" class="form-control" name="nif"
                                            value="<?php echo e($user->nif); ?>">
                                    </div>
                                </div>
                                <label>NIM</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="NIM" class="form-control" name="nim"
                                        value="<?php echo e($user->nim); ?>" required>
                                </div>
                                <label>Nama Lengkap</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Nama User" class="form-control" name="nama"
                                        value="<?php echo e($user->nama); ?>" required>
                                </div>
                                <label>Jenis Kelamin</label>
                                <div class="form-group mb-3">
                                    <select name="jk" class="form-select" required>
                                        <option value="Pria" <?php echo e($user->jk == 'Pria' ? 'selected' : ''); ?>>Pria
                                        </option>
                                        <option value="Wanita" <?php echo e($user->jk == 'Wanita' ? 'selected' : ''); ?>>Wanita
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>Tempat Lahir</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Tempat Lahir" class="form-control"
                                        name="tempat_lahir" value="<?php echo e($user->tempat_lahir); ?>" required>
                                </div>
                                <label>Tanggal Lahir</label>
                                <div class="form-group mb-3">
                                    <input type="date" class="form-control" name="tanggal_lahir"
                                        value="<?php echo e($user->tanggal_lahir); ?>" required>
                                </div>
                                <label>Program Studi</label>
                                <div class="form-group mb-3">
                                    <select name="prodi" class="form-select" required>
                                        <option value="D4 Teknik Informatika"
                                            <?php echo e($user->prodi == 'D4 Teknik Informatika' ? 'selected' : ''); ?>>D4 Teknik
                                            Informatika</option>
                                        <option value="D4 Sistem Informasi Bisnis"
                                            <?php echo e($user->prodi == 'D4 Sistem Informasi Bisnis' ? 'selected' : ''); ?>>D4
                                            Sistem
                                            Informasi Bisnis</option>
                                    </select>
                                </div>
                                <label>Departemen</label>
                                <div class="form-group mb-3">
                                    <select name="department" class="form-select" required>
                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($department->name); ?>"
                                                <?php echo e($department->name == $user->department ? 'selected' : ''); ?>>
                                                <?php echo e($department->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <label>No HP / WA</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Nomor HP" class="form-control" name="no_hp"
                                        value="<?php echo e($user->no_hp); ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label>Email</label>
                                <div class="form-group mb-3">
                                    <input type="email" placeholder="Email" class="form-control" name="email"
                                        value="<?php echo e($user->email); ?>" required>
                                </div>
                                <label>Username</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Username" class="form-control"
                                        name="username" value="<?php echo e($user->username); ?>" required>
                                </div>
                                <label>Password</label>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <input type="password" placeholder="Password" class="form-control"
                                            name="password" id="updatePasswordUser-<?php echo e($user->id); ?>">
                                        <span class="input-group-text show-password-toggle"
                                            id="showPasswordToggle-<?php echo e($user->id); ?>">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <label>Status Keaktifan</label>
                                <div class="form-group mb-3">
                                    <select name="status_keaktifan" class="form-select" required>
                                        <option>Pilih Status Keaktifan</option>
                                        <option value="Aktif"
                                            <?php echo e($user->status_keaktifan == 'Aktif' ? 'selected' : ''); ?>>
                                            Aktif</option>
                                        <option value="Pasif"
                                            <?php echo e($user->status_keaktifan == 'Pasif' ? 'selected' : ''); ?>>
                                            Pasif</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Foto</label>
                                    <input type="file" class="form-control" name="foto">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const showPasswordToggles = document.querySelectorAll(".show-password-toggle");

        showPasswordToggles.forEach(function(toggle) {
            toggle.addEventListener("click", function(event) {
                event.preventDefault(); // Prevent default form submission behavior

                const userId = this.getAttribute("id").replace("showPasswordToggle-", "");
                const passwordField = document.getElementById(`updatePasswordUser-${userId}`);

                // Toggle password visibility
                const type = passwordField.getAttribute("type") === "password" ? "text" :
                    "password";
                passwordField.setAttribute("type", type);

                // Toggle eye icon
                const eyeIcon = this.querySelector("i.fa");
                const eyeIconClass = type === "password" ? "fa-eye" : "fa-eye-slash";
                eyeIcon.className = `fa ${eyeIconClass}`;
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var roleSelect = document.getElementById('roleUpdate<?php echo e($user->id); ?>');
        var nifField = document.getElementById('nifUpdate<?php echo e($user->id); ?>');

        // Function to toggle nif field based on role
        function toggleNifField() {
            if (roleSelect.value === '3') {
                nifField.style.display = 'none';
            } else {
                nifField.style.display = 'block';
                nifField.setAttribute = 'required';
            }
        }

        // Add event listener for role change
        roleSelect.addEventListener('change', function() {
            toggleNifField(); // Toggle nif field when role changes
        });

        // Initial toggle based on selected role
        toggleNifField();
    });
</script>
<?php /**PATH D:\STUDY\PROJECT\laragon\www\sistem_persuratan\resources\views/admin/modal/update_user.blade.php ENDPATH**/ ?>