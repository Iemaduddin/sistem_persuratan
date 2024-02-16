@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.partials.topnav', ['title' => 'Your Profile'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        @if ($oc->foto != null)
                            <img src="{{ asset('storage/' . $oc->foto) }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        @else
                            <img src="/img/team-2.jpg" class="rounded-circle img-fluid border border-3 border-white">
                        @endif
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $oc->nama }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            <i>Organizing Committee </i> {{ $oc->department }}
                        </p>
                    </div>
                </div>
                <div class="col-auto ms-auto">
                    <div class="position-relative">
                        {!! QrCode::size(80)->generate($oc->nim) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form role="form" method="POST" action={{ route('profile.update.oc', $oc->id) }}
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profile</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Steering Committee Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nomor Induk
                                            Mahasiswa</label>
                                        <input class="form-control" type="text" name="nim"
                                            value="{{ $oc->nim }}" disabled>
                                        <input type="hidden" class="form-control" name="nim"
                                            value="{{ $oc->nim }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama Lengkap</label>
                                        <input class="form-control" type="text" name="nama"
                                            value="{{ $oc->nama }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tempat Lahir</label>
                                        <input class="form-control" type="text" name="tempat_lahir"
                                            value="{{ $oc->tempat_lahir }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                                        <input class="form-control" type="date" name="tanggal_lahir"
                                            value="{{ $oc->tanggal_lahir }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Jenis Kelamin</label>
                                        <select name="jk" class="form-select">
                                            <option value="Pria" {{ $oc->jk == 'Pria' ? 'selected' : '' }}>Pria</option>
                                            <option value="Wanita" {{ $oc->jk == 'Wanita' ? 'selected' : '' }}>Wanita
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Program Studi</label>
                                        <select name="prodi" class="form-select">
                                            <option value="D4 Teknik Informatika"
                                                {{ $oc->prodi == 'D4 Teknik Informatika' ? 'selected' : '' }}>D4 Teknik
                                                Informatika</option>
                                            <option value="D4 Sistem Informasi Bisnis"
                                                {{ $oc->prodi == 'D4 Sistem Informasi Bisnis' ? 'selected' : '' }}>D4
                                                Sistem Informasi Bisnis</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Departemen</label>
                                        <select name="department" class="form-select">
                                            <option value="Internal" {{ $oc->department == 'Internal' ? 'selected' : '' }}>
                                                Internal</option>
                                            <option value="PSDM" {{ $oc->department == 'PSDM' ? 'selected' : '' }}>PSDM
                                            </option>
                                            <option value="RMB" {{ $oc->department == 'RMB' ? 'selected' : '' }}>RMB
                                            </option>
                                            <option value="Eksternal"
                                                {{ $oc->department == 'Eksternal' ? 'selected' : '' }}>
                                                Eksternal</option>
                                            <option value="Kominfo" {{ $oc->department == 'Kominfo' ? 'selected' : '' }}>
                                                Kominfo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="example-text-input" class="form-control-label">Role</label>
                                    <div class="form-group">
                                        <select name="status_keaktifan" class="form-select" disabled>
                                            <option value="aktif"
                                                {{ $oc->status_keaktifan == 'aktif' ? 'selected' : '' }}>Aktif
                                            </option>
                                            <option value="pasif"
                                                {{ $oc->status_keaktifan == 'pasif' ? 'selected' : '' }}>
                                                Pasif</option>
                                            <input type="hidden" class="form-control" name="status_keaktifan"
                                                value="{{ $oc->status_keaktifan }}">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Foto</label>
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Contact Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Username</label>
                                        <input class="form-control" type="text" name="username"
                                            value="{{ $oc->username }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nomor Handphone /
                                            Whatsapp</label>
                                        <input class="form-control" type="text" name="no_hp"
                                            value="{{ $oc->no_hp }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ $oc->email }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" placeholder="Password" class="form-control"
                                                name="password" id="updatePasswordSekum-{{ $oc->id }}">
                                            <span class="input-group-text"
                                                id="show-password-toggle-updateSekum-{{ $oc->id }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    {{-- eye password Update oc --}}
                                    <script>
                                        const showPasswordToggle{{ $oc->id }} = document.querySelector(
                                            "#show-password-toggle-updateOc-{{ $oc->id }}");
                                        const passwordField{{ $oc->id }} =
                                            document.querySelector("#updatePasswordOc-{{ $oc->id }}");

                                        showPasswordToggle{{ $oc->id }}.addEventListener("click", function() {
                                            const type = passwordField{{ $oc->id }}.getAttribute("type") === "password" ?
                                                "text" :
                                                "password";
                                            passwordField{{ $oc->id }}.setAttribute("type", type);

                                            // Toggle eye icon
                                            const eyeIconClass = type === "password" ? "fa-eye" : "fa-eye-slash";
                                            this.innerHTML = `<i class="fa ${eyeIconClass}" aria-hidden="true"></i>`;
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile position-relative">
                    <img src="/img/bg-oc.png" alt="Image placeholder" style="height: 250px; object-fit: cover;"
                        class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-lg-n6 mb-2 mb-lg-0">
                                <a href="javascript:;">
                                    @if ($oc->foto == null)
                                        <img src="/img/team-2.jpg"
                                            class="rounded-circle img-fluid border border-3 border-white bg-white">
                                    @else
                                        <img src="{{ asset('storage/' . $oc->foto) }}"
                                            class="rounded-circle img-fluid border border-3 border-white bg-light">
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="text-start mt-4">
                            <div class="text-center mt-0">
                                <p><b>{{ $oc->nama }}</b><br><i>Organizing Committee</i> {{ $oc->department }}
                                </p>
                            </div><br>
                            <table class="table table-responsive">
                                <tbody>
                                    <tr>
                                        <td class="text-bold">NIM</td>
                                        <td colspan="2" class="text-end">{{ $oc->nim }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Tempat, Tanggal Lahir</td>
                                        <td colspan="2" class="text-end">{{ $oc->tempat_lahir }},
                                            {{ $oc->tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Jenis Kelamin</td>
                                        <td colspan="2" class="text-end">{{ $oc->jk }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Program Studi</td>
                                        <td colspan="2" class="text-end">{{ $oc->prodi }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Departemen</td>
                                        <td colspan="2" class="text-end">{{ $oc->department }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">No. HP/WA</td>
                                        <td colspan="2" class="text-end">{{ $oc->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Email</td>
                                        <td colspan="2" class="text-end">{{ $oc->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">Username</td>
                                        <td colspan="2" class="text-end">{{ $oc->username }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.partials.footer')
    </div>
@endsection
