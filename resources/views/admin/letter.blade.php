@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.partials.topnav', ['title' => 'Data Surat'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="tab-content" id="myTabContent">
                            <div class="table-responsive p-0 fade show active text-sm p-4"style="width:100%">
                                <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal"
                                    data-bs-target="#tambahLetter"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah
                                    Data
                                </button>
                                @include('admin.modal.tambah_letter')
                                <table class="hover table-responsive align-items-center mb-0" id="LetterTable">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark text-xs font-weight-bolder ">
                                                Id
                                            </th>
                                            <th class="text-uppercase text-dark text-xs font-weight-bolder  ps-2">
                                                No. Surat
                                            </th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Departemen</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Singkatan Kegiatan</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Kode</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Nama Kegiatan</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Pelaksanaan</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                CP</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Jumlah Lampiran</th>
                                            <th class="text-center text-uppercase text-dark text-xs font-weight-bolder ">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($letters as $letter)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $loop->iteration }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>

                                                    <p class="text-sm font-weight-bold mb-0">{{ $letter->nomor_surat }}</p>

                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $letter->department }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $letter->singkatan_nama_kegiatan }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $letter->kode_unik }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $letter->nama_kegiatan }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $letter->hari_kegiatan }}, {{ $letter->tanggal_kegiatan }}
                                                        ({{ $letter->jam_mulai }} - {{ $letter->jam_selesai }})
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $letter->contact_person }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $letter->jumlah_lampiran }}</p>
                                                </td>
                                                <td class="align-middle text-end p-2">
                                                    <div
                                                        class="d-flex px-3 ps-2 py-1 justify-content-center align-items-center gap-1">
                                                        <a href="{{ route('detail-surat.admin', $letter->id) }}"
                                                            class="btn btn-outline-secondary btn-xs"><i
                                                                class="fa fa-info text-dark "></i></a>
                                                        <button class="btn btn-outline-dark btn-xs" data-bs-toggle="modal"
                                                            data-bs-target="#detailDataLetter-{{ $letter->id }}"><i
                                                                class="fa fa-info text-dark "></i></button>
                                                        @include('admin.modal.detail_letter')
                                                        <button class="btn btn-outline-primary btn-xs"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#updateDataLetter-{{ $letter->id }}"><i
                                                                class="fa fa-pencil text-primary cursor-pointer"></i></button>
                                                        <form action="{{ route('letter.destroy', $letter->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-xs confirm-delete"><i
                                                                    class="fa fa-trash text-danger "></i></button>
                                                        </form>
                                                        @include('admin.modal.update_letter')
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
