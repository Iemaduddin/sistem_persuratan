<div class="modal fade text-left" id="updateDataSc-{{ $sc->id ?? auth()->user()->sc_id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalUpdateDataSc" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalUpdateDataSc">Update Data SC</h4>
                <i class="fa fa-times close cursor-pointer" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <form action="{{ route('sc.update', $sc->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row text-start">
                        <div class="col-sm-6">
                            <label>Nama Lengkap</label>
                            <div class="form-group">
                                <input type="text" placeholder="Nama SC" class="form-control" name="nama"
                                    value="{{ $sc->nama }}" required>
                            </div>
                            <label>NIF</label>
                            <div class="form-group">
                                <input type="text" placeholder="NIF" class="form-control" name="nif"
                                    value="{{ $sc->nif }}" required>
                            </div>
                            <label>Tempat Lahir</label>
                            <div class="form-group">
                                <input type="text" placeholder="Tempat Lahir" class="form-control"
                                    name="tempat_lahir" value="{{ $sc->tempat_lahir }}" required>
                            </div>
                            <label>Tanggal Lahir</label>
                            <div class="form-group">
                                <input type="date" class="form-control"
                                    name="tanggal_lahir"value="{{ $sc->tanggal_lahir }}" required>
                            </div>
                            <label>Jenis Kelamin</label>
                            <div class="form-group">
                                <select name="jk" class="form-select">
                                    <option value="Pria" {{ $sc->jk == 'Pria' ? 'selected' : '' }}>Pria</option>
                                    <option value="Wanita" {{ $sc->jk == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                                </select>
                            </div>
                            <label>Program Studi</label>
                            <div class="form-group">
                                <select name="prodi" class="form-select">
                                    <option value="D4 Teknik Informatika"
                                        {{ $sc->prodi == 'D4 Teknik Informatika' ? 'selected' : '' }}>D4 Teknik
                                        Informatika</option>
                                    <option value="D4 Sistem Informasi Bisnis"
                                        {{ $sc->prodi == 'D4 Sistem Informasi Bisnis' ? 'selected' : '' }}>D4 Sistem
                                        Informasi Bisnis</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Departemen</label>
                            <div class="form-group">
                                <select name="department" class="form-select">
                                    <option value="BPH Umum" {{ $sc->department == 'BPH Umum' ? 'selected' : '' }}>BPH
                                        Umum</option>
                                    <option value="Internal" {{ $sc->department == 'Internal' ? 'selected' : '' }}>
                                        Internal</option>
                                    <option value="PSDM" {{ $sc->department == 'PSDM' ? 'selected' : '' }}>PSDM
                                    </option>
                                    <option value="RMB" {{ $sc->department == 'RMB' ? 'selected' : '' }}>RMB
                                    </option>
                                    <option value="Eksternal" {{ $sc->department == 'Eksternal' ? 'selected' : '' }}>
                                        Eksternal</option>
                                    <option value="Kominfo" {{ $sc->department == 'Kominfo' ? 'selected' : '' }}>
                                        Kominfo</option>
                                </select>
                            </div>
                            <label>No HP / WA</label>
                            <div class="form-group">
                                <input type="text" placeholder="Nomor HP" class="form-control" name="no_hp"
                                    value="{{ $sc->no_hp }}">
                            </div>
                            <label>Email</label>
                            <div class="form-group">
                                <input type="email" placeholder="Email" class="form-control" name="email"
                                    value="{{ $sc->email }}" required>
                            </div>
                            <label>Username</label>
                            <div class="form-group">
                                <input type="text" placeholder="Username" class="form-control" name="username"
                                    value="{{ $sc->username }}" required>
                            </div>
                            <label>Password</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" placeholder="Password" class="form-control" name="password"
                                        id="updatePasswordSc-{{ $sc->id }}">
                                    <span class="input-group-text"
                                        id="show-password-toggle-updateSc-{{ $sc->id }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                            {{-- eye password Update SC --}}
                            <script>
                                const showPasswordToggle{{ $sc->id }} = document.querySelector(
                                    "#show-password-toggle-updateSc-{{ $sc->id }}");
                                const passwordField{{ $sc->id }} = document.querySelector("#updatePasswordSc-{{ $sc->id }}");

                                showPasswordToggle{{ $sc->id }}.addEventListener("click", function() {
                                    const type = passwordField{{ $sc->id }}.getAttribute("type") === "password" ? "text" :
                                        "password";
                                    passwordField{{ $sc->id }}.setAttribute("type", type);

                                    // Toggle eye icon
                                    const eyeIconClass = type === "password" ? "fa-eye" : "fa-eye-slash";
                                    this.innerHTML = `<i class="fa ${eyeIconClass}" aria-hidden="true"></i>`;
                                });
                            </script>

                            <label>Role</label>
                            <div class="form-group">
                                <select name="role" class="form-select">
                                    <option value="Sekum" {{ $sc->role == 'Sekum' ? 'selected' : '' }}>Sekum</option>
                                    <option value="SC Kestari" {{ $sc->role == 'SC Kestari' ? 'selected' : '' }}>SC
                                        Kestari</option>
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
