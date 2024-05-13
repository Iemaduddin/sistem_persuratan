<div class="modal fade text-left" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="modalTambahUser"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTambahUser">Tambah Data User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Role</label>
                            <div class="form-group mb-3">
                                <select name="role_id" id="role" class="form-select">
                                    <option value="2">Sekretaris Umum
                                    </option>
                                    <option value="3">OC
                                    </option>
                                </select>
                            </div>
                            <div id="nif">
                                <label>NIF</label>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="NIF" class="form-control" name="nif"
                                        required>
                                </div>
                            </div>
                            <label>NIM</label>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="NIM" class="form-control" name="nim" required>
                            </div>
                            <label>Nama Lengkap</label>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Nama User" class="form-control" name="nama"
                                    required>
                            </div>
                            <label>Jenis Kelamin</label>
                            <div class="form-group mb-3">
                                <select name="jk" class="form-select">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label>Tempat Lahir</label>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Tempat Lahir" class="form-control"
                                    name="tempat_lahir">
                            </div>
                            <label>Tanggal Lahir</label>
                            <div class="form-group mb-3">
                                <input type="date" class="form-control" name="tanggal_lahir">
                            </div>
                            <label>Program Studi</label>
                            <div class="form-group mb-3">
                                <select name="prodi" class="form-select">
                                    <option value="D4 Teknik Informatika">D4 Teknik Informatika</option>
                                    <option value="D4 Sistem Informasi Bisnis">D4 Sistem Informasi Bisnis</option>
                                </select>
                            </div>
                            <label>Departemen</label>
                            <div class="form-group mb-3">
                                <select name="department" class="form-select">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->name }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label>No HP / WA</label>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Nomor HP" class="form-control" name="no_hp">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label>Email</label>
                            <div class="form-group mb-3">
                                <input type="email" placeholder="Email" class="form-control" name="email" required>
                            </div>
                            <label>Username</label>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Username" class="form-control" name="username"
                                    required>
                            </div>
                            <label>Password</label>
                            <div class="form-group mb-3">
                                <div class="input-group">
                                    <input type="password" placeholder="Password" class="form-control" name="password"
                                        id="tambahPasswordUser" required>
                                    <span class="input-group-text" id="show-password-toggle-tambahUser">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            <label>Status Keaktifan</label>
                            <div class="form-group mb-3">
                                <select name="status_keaktifan" class="form-select">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Pasif">Pasif</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Foto</label>
                                <input type="file" class="form-control" name="foto">
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
{{-- eye password Tambah --}}
<script>
    const showPasswordToggle = document.querySelector("#show-password-toggle-tambahUser");
    const passwordField = document.querySelector("#tambahPasswordUser");

    showPasswordToggle.addEventListener("click", function() {
        const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
        passwordField.setAttribute("type", type);

        // Toggle eye icon
        const eyeIconClass = type === "password" ? "fa-eye" : "fa-eye-slash";
        this.innerHTML = `<i class="fa ${eyeIconClass}" aria-hidden="true"></i>`;
    });
</script>
<script>
    document.getElementById('role').addEventListener('change', function() {
        var role = this.value;
        var nifField = document.getElementById('nif');

        if (role === '3') {
            nifField.style.display = 'none';
        } else {
            nifField.style.display = 'block';
        }
    });
</script>
