<div class="modal fade text-left" id="updateDataOc-{{ $oc->id ?? auth()->user()->oc_id }}" tabindex="-1" role="dialog"
    aria-labelledby="modalUpdateDataOc" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalUpdateDataOc">Update Data OC</h4>
                <i class="fa fa-times close cursor-pointer" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <form action="{{ route('oc.update', $oc->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body text-start">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Nama Lengkap</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" value="{{ $oc->nama }}"
                                    required>
                            </div>
                            <label>NIM</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nim" value="{{ $oc->nim }}"
                                    required>
                            </div>
                            <label>Tempat Lahir</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="tempat_lahir"
                                    value="{{ $oc->tempat_lahir }}" required>
                            </div>
                            <label>Tanggal Lahir</label>
                            <div class="form-group">
                                <input type="date" class="form-control"
                                    name="tanggal_lahir"value="{{ $oc->tanggal_lahir }}" required>
                            </div>
                            <label>Jenis Kelamin</label>
                            <div class="form-group">
                                <select name="jk" class="form-select">
                                    <option value="Pria" {{ $oc->jk == 'Pria' ? 'selected' : '' }}>Pria</option>
                                    <option value="Wanita" {{ $oc->jk == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                                </select>
                            </div>
                            <label>Program Studi</label>
                            <div class="form-group">
                                <select name="prodi" class="form-select">
                                    <option value="D4 Teknik Informatika"
                                        {{ $oc->prodi == 'D4 Teknik Informatika' ? 'selected' : '' }}>D4 Teknik
                                        Informatika</option>
                                    <option value="D4 Sistem Informasi Bisnis"
                                        {{ $oc->prodi == 'D4 Sistem Informasi Bisnis' ? 'selected' : '' }}>D4 Sistem
                                        Informasi Bisnis</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Departemen</label>
                            <div class="form-group">
                                <select name="department" class="form-select">
                                    <option value="Internal" {{ $oc->department == 'Internal' ? 'selected' : '' }}>
                                        Internal</option>
                                    <option value="PSDM" {{ $oc->department == 'PSDM' ? 'selected' : '' }}>PSDM
                                    </option>
                                    <option value="RMB" {{ $oc->department == 'RMB' ? 'selected' : '' }}>RMB
                                    </option>
                                    <option value="Eksternal" {{ $oc->department == 'Eksternal' ? 'selected' : '' }}>
                                        Eksternal</option>
                                    <option value="Kominfo" {{ $oc->department == 'Kominfo' ? 'selected' : '' }}>
                                        Kominfo</option>
                                </select>
                            </div>
                            <label>No HP / WA</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="no_hp" value="{{ $oc->no_hp }}">
                            </div>
                            <label>Email</label>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" value="{{ $oc->email }}"
                                    required>
                            </div>
                            <label>Username</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" value="{{ $oc->username }}"
                                    required>
                            </div>
                            <label>Password</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" placeholder="Password" class="form-control" name="password"
                                        id="updatePasswordOc-{{ $oc->id }}">
                                    <span class="input-group-text"
                                        id="show-password-toggle-updateOc-{{ $oc->id }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>

                            {{-- eye password Update OC --}}
                            <script>
                                const showPasswordToggleOc{{ $oc->id }} = document.querySelector(
                                    "#show-password-toggle-updateOc-{{ $oc->id }}");
                                const passwordFieldOc{{ $oc->id }} = document.querySelector("#updatePasswordOc-{{ $oc->id }}");

                                showPasswordToggleOc{{ $oc->id }}.addEventListener("click", function() {
                                    const type = passwordFieldOc{{ $oc->id }}.getAttribute("type") === "password" ? "text" :
                                        "password";
                                    passwordFieldOc{{ $oc->id }}.setAttribute("type", type);

                                    // Toggle eye icon
                                    const eyeIconClass = type === "password" ? "fa-eye" : "fa-eye-slash";
                                    this.innerHTML = `<i class="fa ${eyeIconClass}" aria-hidden="true"></i>`;
                                });
                            </script>


                            <label>Status Keaktifan</label>
                            <div class="form-group">
                                <select name="status_keaktifan" class="form-select">
                                    <option value="Aktif" {{ $oc->status_keaktifan == 'Aktif' ? 'selected' : '' }}>
                                        Aktif</option>
                                    <option value="Pasif" {{ $oc->status_keaktifan == 'Pasif' ? 'selected' : '' }}>
                                        Pasif</option>
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
