@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.partials.topnav', ['title' => 'User Management'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="nav-tabs-boxed">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active fst-italic" id="sc-tab" data-bs-toggle="tab" href="#sc"
                                        role="tab" aria-controls="sc" aria-selected="true">Steering Committee</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fst-italic" id="oc-tab" data-bs-toggle="tab" href="#oc"
                                        role="tab" aria-controls="oc" aria-selected="false">Organizing Committee</a>
                                </li>
                            </ul>
                            <style>
                                #myTab {
                                    .nav-item .active {
                                        background-color: #ffc030;
                                        color: white;
                                    }

                                    .nav-item:hover {
                                        font-weight: bold;
                                        color: white;
                                    }
                                }
                            </style>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="tab-content" id="myTabContent">
                            {{-- sc --}}
                            <div class="table-responsive p-0 tab-pane fade show active text-sm p-4" id="sc"
                                role="tabpanel" aria-labelledby="sc-tab" style="width:100%">
                                <div class="d-flex justify-content-end mb-3 gap-2">
                                    <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal"
                                        data-bs-target="#tambahSc"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah
                                        Data</button>
                                    <form action="{{ route('import-sc') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label for="importFile" class="btn btn-dark btn-sm">
                                            <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Import
                                            <input type="file" name="fileSc" id="importFile" style="display: none;"
                                                onchange="form.submit()">
                                        </label>
                                    </form>
                                    <a href="{{ route('export-sc') }}" class="btn btn-primary btn-sm ms-auto">
                                        <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Export
                                    </a>
                                    <a href="{{ route('download-template-sc') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;Download Template
                                    </a>
                                </div>
                                @include('admin.modal.tambah_sc')
                                <table class="hover table-responsive align-items-center mb-0" id="ScTable">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-xs font-weight-bolder ">
                                                Id
                                            </th>
                                            <th class="text-uppercase text-dark text-xs font-weight-bolder  ps-2">
                                                NIF
                                            </th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Nama</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                TTL</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Prodi</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Departemen</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                No. Hp</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Email</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Username</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Role</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($scs as $sc)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $loop->iteration }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{ $sc->nif }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{ $sc->nama }}</p>
                                                </td>
                                                <td>
                                                    @if ($sc->tempat_lahir || $sc->tanggal_lahir != null)
                                                        <p class="text-sm font-weight-bold mb-0">{{ $sc->tempat_lahir }},
                                                            {{ $sc->tanggal_lahir }}</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">{{ $sc->prodi }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $sc->department }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $sc->no_hp }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $sc->email }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $sc->username }}</p>
                                                </td>
                                                <td>
                                                    @if ($sc->role == 'Sekum')
                                                        <span
                                                            class="badge badge-sm bg-gradient-warning">{{ $sc->role }}</span>
                                                    @else
                                                        <span
                                                            class="badge badge-sm bg-gradient-dark">{{ $sc->role }}</span>
                                                    @endif
                                                </td>

                                                <td class="align-middle text-end p-2">
                                                    <div
                                                        class="d-flex px-3 ps-2 py-1 justify-content-center align-items-center gap-1">
                                                        <button class="btn btn-outline-dark btn-xs" data-bs-toggle="modal"
                                                            data-bs-target="#detailDataSc-{{ $sc->id }}"><i
                                                                class="fa fa-info text-dark "></i></button>
                                                        @include('admin.modal.detail_sc')
                                                        <button class="btn btn-outline-primary btn-xs"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#updateDataSc-{{ $sc->id }}"><i
                                                                class="fa fa-pencil text-primary cursor-pointer"></i></button>
                                                        @include('admin.modal.update_sc')
                                                        <form action="{{ route('sc.destroy', $sc->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-xs confirm-delete"><i
                                                                    class="fa fa-trash text-danger "></i></button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{-- oc --}}
                            <div class="table-responsive p-0 tab-pane fade text-sm p-4" id="oc" role="tabpanel"
                                aria-labelledby="oc-tab">
                                <div class="d-flex justify-content-end mb-3 gap-2">
                                    <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal"
                                        data-bs-target="#tambahOc"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah
                                        Data</button>
                                    <form action="{{ route('import-oc') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label for="importFileOc" class="btn btn-dark btn-sm">
                                            <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Import
                                            <input type="file" name="fileOc" id="importFileOc"
                                                style="display: none;" onchange="form.submit()">
                                        </label>
                                    </form>
                                    <a href="{{ route('export-oc') }}" class="btn btn-primary btn-sm ms-auto">
                                        <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Export
                                    </a>
                                    <a href="{{ route('download-template-oc') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-download"></i>&nbsp;&nbsp;&nbsp;Download Template
                                    </a>
                                </div>
                                @include('admin.modal.tambah_oc')
                                <table class="hover table-responsive align-items-center mb-0" id="OcTable">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-xs font-weight-bolder">
                                                Id
                                            </th>
                                            <th class="text-uppercase text-dark text-xs font-weight-bolder">
                                                NIM
                                            </th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder">
                                                Nama</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder">
                                                TTL</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder">
                                                JK</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder">
                                                Prodi</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder">
                                                Departemen</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder">
                                                No. Hp</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder">
                                                Email</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder">
                                                Username</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder">
                                                Status</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($ocs as $oc)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $loop->iteration }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{ $oc->nim }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{ $oc->nama }}</p>
                                                </td>
                                                <td>
                                                    @if ($oc->tempat_lahir || $oc->tanggal_lahir != null)
                                                        <p class="text-sm font-weight-bold mb-0">{{ $oc->tempat_lahir }},
                                                            {{ $oc->tanggal_lahir }}</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $oc->jk }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $oc->prodi }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $oc->department }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $oc->no_hp }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $oc->email }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $oc->username }}</p>
                                                </td>
                                                <td>
                                                    @if ($oc->status_keaktifan == 'Aktif')
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">{{ $oc->status_keaktifan }}</span>
                                                    @else
                                                        <span
                                                            class="badge badge-sm bg-gradient-danger">{{ $oc->status_keaktifan }}</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-end p-2">
                                                    <div
                                                        class="d-flex px-3 ps-2 py-1 justify-content-center align-items-center gap-1">
                                                        <button class="btn btn-outline-dark btn-xs" data-bs-toggle="modal"
                                                            data-bs-target="#detailDataOc-{{ $oc->id }}"><i
                                                                class="fa fa-info text-dark "></i></button>
                                                        @include('admin.modal.detail_oc')
                                                        <button class="btn btn-outline-primary btn-xs"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#updateDataOc-{{ $oc->id }}"><i
                                                                class="fa fa-pencil text-primary"></i></button>
                                                        @include('admin.modal.update_oc')
                                                        <form action="{{ route('oc.destroy', $oc->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-xs confirm-delete"><i
                                                                    class="fa fa-trash text-danger "></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
