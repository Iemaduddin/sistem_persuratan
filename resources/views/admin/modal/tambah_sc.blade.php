<div class="modal fade text-left" id="tambahSc" tabindex="-1" role="dialog" aria-labelledby="modalTambahSc"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTambahSc">Tambah Data SC</h4>
                <i class="fa fa-times close cursor-pointer" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <form action="{{ route('sc.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Nama Lengkap</label>
                            <div class="form-group">
                                <input type="text" placeholder="Nama SC" class="form-control" name="nama"
                                    required>
                            </div>
                            <label>NIF</label>
                            <div class="form-group">
                                <input type="text" placeholder="NIF" class="form-control" name="nif" required>
                            </div>
                            <label>Tempat Lahir</label>
                            <div class="form-group">
                                <input type="text" placeholder="Tempat Lahir" class="form-control"
                                    name="tempat_lahir" required>
                            </div>
                            <label>Tanggal Lahir</label>
                            <div class="form-group">
                                <input type="date" class="form-control" name="tanggal_lahir" required>
                            </div>
                            <label>Jenis Kelamin</label>
                            <div class="form-group">
                                <select name="jk" class="form-select">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                            <label>Program Studi</label>
                            <div class="form-group">
                                <select name="prodi" class="form-select">
                                    <option value="D4 Teknik Informatika">D4 Teknik Informatika</option>
                                    <option value="D4 Sistem Informasi Bisnis">D4 Sistem Informasi Bisnis</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Departemen</label>
                            <div class="form-group">
                                <select name="department" class="form-select">
                                    <option value="BPH Umum">BPH Umum</option>
                                    <option value="Internal">Internal</option>
                                    <option value="PSDM">PSDM</option>
                                    <option value="RMB">RMB</option>
                                    <option value="Eksternal">Eksternal</option>
                                    <option value="Kominfo">Kominfo</option>
                                </select>
                            </div>
                            <label>No HP / WA</label>
                            <div class="form-group">
                                <input type="text" placeholder="Nomor HP" class="form-control" name="no_hp">
                            </div>
                            <label>Email</label>
                            <div class="form-group">
                                <input type="email" placeholder="Email" class="form-control" name="email" required>
                            </div>
                            <label>Username</label>
                            <div class="form-group">
                                <input type="text" placeholder="Username" class="form-control" name="username"
                                    required>
                            </div>
                            <label>Password</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" placeholder="Password" class="form-control" name="password"
                                        id="tambahPasswordSc">
                                    <span class="input-group-text" id="show-password-toggle-tambahSc">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            {{-- eye password Tambah --}}
                            <script>
                                const showPasswordToggle = document.querySelector("#show-password-toggle-tambahSc");
                                const passwordField = document.querySelector("#tambahPasswordSc");

                                showPasswordToggle.addEventListener("click", function() {
                                    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
                                    passwordField.setAttribute("type", type);

                                    // Toggle eye icon
                                    const eyeIconClass = type === "password" ? "fa-eye" : "fa-eye-slash";
                                    this.innerHTML = `<i class="fa ${eyeIconClass}" aria-hidden="true"></i>`;
                                });
                            </script>
                            <label>Role</label>
                            <div class="form-group">
                                <select name="role" class="form-select">
                                    <option value="Sekum">Sekum</option>
                                    <option value="SC Kestari">SC Kestari</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
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
