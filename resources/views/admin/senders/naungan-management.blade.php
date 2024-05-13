@extends('layouts.master')
@section('title')
    @lang('translation.Data_Tables')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet ">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Pages
        @endslot
        @slot('title')
            Sender OKI Management
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <!-- Dropdown untuk Tambah Data -->
                    <div class="btn-group gap-2 ">
                        <button class="btn btn-success btn-md rounded fw-bold text-white" type="button"
                            data-bs-toggle="modal" data-bs-target="#tambahNaungan">
                            <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Data
                        </button>
                    </div>
                </div>
                @include('admin.senders.modal.tambah_naungan')
                <div class="card-body">
                    <table id="datatable" class="table dt-responsive  w-100">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Pengirim
                                </th>
                                <th>
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($naungans as $sender)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $sender->name }}
                                    </td>
                                    <td class="align-middle p-2">
                                        <div class="btn-group gap-2">
                                            <button class="btn btn-outline-primary btn-md rounded-2" data-bs-toggle="modal"
                                                data-bs-target="#updateDataSender-{{ $sender->id }}"><i
                                                    class="fas fa-edit"></i></button>
                                            @include('admin.senders.modal.update_naungan')
                                            <form action="{{ route('senders.destroy', $sender->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-outline-danger btn-md rounded-2 confirm-delete"><i
                                                        class="far fa-trash-alt"></i></button>
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
            <!-- end cardaa -->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/datatables.net/datatables.net.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons/datatables.net-buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.js') }}">
    </script>
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
@endsection
