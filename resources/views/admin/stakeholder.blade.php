@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.partials.topnav', ['title' => 'Nama Penandatangan'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="tab-content" id="myTabContent">
                            <div class="table-responsive p-0 fade show active text-sm p-4"style="width:100%">
                                <div class="d-flex justify-content-end mb-3 gap-2">
                                    <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal"
                                        data-bs-target="#tambahStakeholder"><i
                                            class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Data</button>
                                    <form action="{{ route('import-stakeholder') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <label for="importFile" class="btn btn-dark btn-sm">
                                            <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Import
                                            <input type="file" name="file" id="importFile" style="display: none;"
                                                onchange="form.submit()">
                                        </label>
                                    </form>
                                    <a href="{{ route('export-stakeholder') }}" class="btn btn-primary btn-sm ms-auto">
                                        <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Export
                                    </a>
                                </div>


                                @include('admin.modal.tambah_stakeholder')
                                <table class="hover table-responsive align-items-center mb-0" id="StakeholderTable">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-xs font-weight-bolder ">
                                                Id
                                            </th>
                                            <th class="text-uppercase text-dark text-xs font-weight-bolder">
                                                NIP
                                            </th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                NIM</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Nama</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Jabatan</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($stakeholders as $stakeholder)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $loop->iteration }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($stakeholder->nip != null)
                                                        <p class="text-sm font-weight-bold mb-0">{{ $stakeholder->nip }}</p>
                                                    @else
                                                        <p class="text-sm font-weight-bold mb-0">-</p>
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($stakeholder->nim != null)
                                                        <p class="text-sm font-weight-bold mb-0">{{ $stakeholder->nim }}
                                                        </p>
                                                    @else
                                                        <p class="text-sm font-weight-bold mb-0">-</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $stakeholder->nama }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $stakeholder->jabatan }}</p>
                                                </td>
                                                <td>
                                                    <div
                                                        class="d-flex px-3 ps-2 py-1 justify-content-center align-items-center gap-1">
                                                        <button class="btn btn-outline-dark btn-xs" data-bs-toggle="modal"
                                                            data-bs-target="#detailDataStakeholder-{{ $stakeholder->id }}"><i
                                                                class="fa fa-info text-dark "></i></button>
                                                        @include('admin.modal.detail_stakeholder')
                                                        <button class="btn btn-outline-primary btn-xs"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#updateDataStakeholder-{{ $stakeholder->id }}"><i
                                                                class="fa fa-pencil text-primary cursor-pointer"></i></button>
                                                        @include('admin.modal.update_stakeholder')
                                                        <form action="{{ route('stakeholder.destroy', $stakeholder->id) }}"
                                                            method="POST">
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
