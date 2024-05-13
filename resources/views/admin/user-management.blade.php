@extends('layouts.master')
@section('title')
    User Management
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
            User Management
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <!-- Dropdown untuk Tambah Data -->
                    <div class="btn-group gap-2 ">
                        <button class="btn btn-success btn-md rounded fw-bold text-white" type="button"
                            data-bs-toggle="modal" data-bs-target="#tambahUser">
                            <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Data
                        </button>
                    </div>
                </div>
                @include('admin.modal.tambah_user')
                <div class="card-body">
                    <table id="datatable" class="table dt-responsive  w-100">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    NIF
                                </th>
                                <th>
                                    NIM
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    TTL
                                </th>
                                <th>
                                    JK
                                </th>
                                <th>
                                    Prodi
                                </th>
                                <th>
                                    Departemen
                                </th>
                                <th>
                                    No. HP
                                </th>
                                <th>
                                    Keaktifan
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    @if ($user->role_id == 1)
                                        <td><span class="badge bg-dark">Admin</span></td>
                                    @elseif ($user->role_id == 2)
                                        <td>{{ $user->nif }}</td>
                                    @elseif ($user->role_id == 3)
                                        <td><span class="badge bg-info">OC</span></td>
                                    @endif
                                    <td>
                                        {{ $user->nim }}
                                    </td>
                                    <td>
                                        {{ $user->username }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    @if ($user->tempat_lahir && $user->tanggal_lahir)
                                        <td>
                                            {{ $user->tempat_lahir }},
                                            {{ $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('j-M-Y') : null }}
                                        </td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    <td>
                                        {{ $user->jk }}
                                    </td>
                                    <td>
                                        {{ $user->prodi }}
                                    </td>
                                    <td>
                                        {{ $user->department }}
                                    </td>
                                    <td>
                                        {{ $user->no_hp }}
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $user->status_keaktifan == 'Aktif' ? 'bg-primary' : 'bg-secondary' }}"
                                            style="width: 40px">{{ $user->status_keaktifan }}</span>
                                    </td>
                                    <td>
                                        @if (Cache::has('user-online' . $user->id))
                                            <span class="badge bg-success">Online</span>
                                        @else
                                            <span class="badge bg-danger">Offline</span>
                                        @endif
                                    </td>
                                    <td class="align-middle p-2">
                                        <div class="btn-group gap-2">
                                            <button class="btn btn-outline-primary btn-md rounded-2" data-bs-toggle="modal"
                                                data-bs-target="#updateDataUser-{{ $user->id }}"><i
                                                    class="fas fa-edit"></i></button>
                                            @include('admin.modal.update_user')
                                            @if ($user->role->name != 'Admin')
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-outline-danger btn-md rounded-2 confirm-delete"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    NIF
                                </th>
                                <th>
                                    NIM
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    TTL
                                </th>
                                <th>
                                    JK
                                </th>
                                <th>
                                    Prodi
                                </th>
                                <th>
                                    Departemen
                                </th>
                                <th>
                                    No. HP
                                </th>
                                <th>
                                    Keaktifan
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action</th>
                            </tr>
                        </tfoot>
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
