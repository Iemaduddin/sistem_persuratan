@extends('layouts.master')
@section('title') @lang('translation.Kanban_Board')  @endsection
@section('css')
<link href="{{ URL::asset('assets/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Tasks @endslot
@slot('title') Kanban Board @endslot
@endcomponent
<div class="row">
    <div class="col-lg-4">
        <div class="border rounded p-4">
            <div class="dropdown float-end">
                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Delete</a>
                </div>
            </div> <!-- end dropdown -->

            <h4 class="card-title mb-4">Upcoming</h4>
            <div id="task-1">
                <div id="upcoming-task" class="pb-1 task-list">

                    <div class="card task-box" id="uptask-1">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#uptask-1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                    <a class="dropdown-item deletetask" href="#" data-id="#uptask-1">Delete</a>
                                </div>
                            </div> <!-- end dropdown -->
                            <div class="float-end ms-2">
                                <span class="badge rounded-pill bg-secondary-subtle text-secondary font-size-12" id="task-status">Waiting</span>
                            </div>
                            <div>
                                <h5 class="font-size-14"><a href="javascript: void(0);" class="text-dark" id="task-name">Topnav layout design</a></h5>
                                <p class="text-muted mb-4">14 Oct, 2019</p>
                            </div>
                            <div class="avatar-group float-start task-assigne">
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                        <img src="{{ URL::asset('assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                        <img src="{{ URL::asset('assets/images/users/avatar-5.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-6">
                                        <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block">
                                        <div class="avatar-sm">
                                            <span class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                3+
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="text-end">
                                <h5 class="font-size-15 mb-1" id="task-budget">$ 145</h5>
                                <p class="mb-0 text-muted">Budget</p>
                            </div>
                        </div>

                    </div>
                    <!-- end task card -->

                    <div class="card task-box" id="uptask-2">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#uptask-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                    <a class="dropdown-item deletetask" href="#" data-id="#uptask-2">Delete</a>
                                </div>
                            </div> <!-- end dropdown -->
                            <div class="float-end ms-2">
                                <span class="badge rounded-pill bg-primary-subtle text-primary font-size-12" id="task-status">Approved</span>
                            </div>
                            <div>
                                <h5 class="font-size-14"><a href="javascript: void(0);" class="text-dark" id="task-name">Create a New Landing UI</a></h5>
                                <p class="text-muted">15 Oct, 2019</p>
                            </div>

                            <ul class="ps-3 mb-4 text-muted" id="task-desc">
                                <li class="py-1">Separate existence is a myth.</li>
                                <li class="py-1">For music, sport, etc</li>
                            </ul>

                            <div class="avatar-group float-start task-assigne">
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-1">
                                        <img src="{{ URL::asset('assets/images/users/avatar-1.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-2">
                                        <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                        <img src="{{ URL::asset('assets/images/users/avatar-5.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                            </div>
                            <div class="text-end">
                                <h5 class="font-size-15 mb-1" id="task-budget">$ 112</h5>
                                <p class="mb-0 text-muted">Budget</p>
                            </div>
                        </div>

                    </div>
                    <!-- end task card -->

                    <div class="card task-box" id="uptask-3">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#uptask-3" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                    <a class="dropdown-item deletetask" href="#" data-id="#uptask-3">Delete</a>
                                </div>
                            </div> <!-- end dropdown -->
                            <div class="float-end ms-2">
                                <span class="badge rounded-pill bg-secondary-subtle text-secondary font-size-12" id="task-status">Waiting</span>
                            </div>
                            <div>
                                <h5 class="font-size-14"><a href="javascript: void(0);" class="text-dark" id="task-name">Create a Dason Logo</a></h5>
                                <p class="text-muted mb-4">15 Oct, 2019</p>
                            </div>

                            <div class="avatar-group float-start task-assigne">
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                        <img src="{{ URL::asset('assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                        <img src="{{ URL::asset('assets/images/users/avatar-5.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block">
                                        <div class="avatar-sm">
                                            <span class="avatar-title rounded-circle bg-danger text-white font-size-16">
                                                9+
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="text-end">
                                <h5 class="font-size-15 mb-1" id="task-budget">$ 86</h5>
                                <p class="mb-0 text-muted">Budget</p>
                            </div>
                        </div>

                    </div>
                    <!-- end task card -->

                </div>

                <div class="text-center d-grid">
                    <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-id="#upcoming-task"><i class="mdi mdi-plus me-1"></i> Add New</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-lg-4">
        <div class="border rounded p-4">
            <div class="dropdown float-end">
                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Delete</a>
                </div>
            </div> <!-- end dropdown -->

            <h4 class="card-title mb-4">In Progress</h4>
            <div id="task-2">
                <div id="inprogress-task" class="pb-1 task-list">
                    <div class="card task-box" id="intask-1">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#intask-1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                    <a class="dropdown-item deletetask" href="#" data-id="#intask-1">Delete</a>
                                </div>
                            </div> <!-- end dropdown -->
                            <div class="float-end ms-2">
                                <span class="badge rounded-pill bg-success-subtle text-success font-size-12" id="task-status">Complete</span>
                            </div>
                            <div>
                                <h5 class="font-size-14"><a href="javascript: void(0);" class="text-dark" id="task-name">Brand logo design</a></h5>
                                <p class="text-muted">12 Oct, 2019</p>
                            </div>

                            <ul class="list-inine ps-0 mb-4">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);">
                                        <div class="border rounded avatar-md">
                                            <span class="avatar-title bg-transparent">
                                                <img src="{{ URL::asset('assets/images/companies/img-1.png') }}" alt="" class="avatar-md p-2">
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);">
                                        <div class="border rounded avatar-md">
                                            <span class="avatar-title bg-transparent">
                                                <img src="{{ URL::asset('assets/images/companies/img-2.png') }}" alt="" class="avatar-md p-2">
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);">
                                        <div class="border rounded avatar-md">
                                            <span class="avatar-title bg-transparent">
                                                <img src="{{ URL::asset('assets/images/companies/img-3.png') }}" alt="" class="avatar-md p-2">
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                            <div class="avatar-group float-start task-assigne">
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-7">
                                        <img src="{{ URL::asset('assets/images/users/avatar-7.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-8">
                                        <img src="{{ URL::asset('assets/images/users/avatar-8.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                            </div>

                            <div class="text-end">
                                <h5 class="font-size-15 mb-1" id="task-budget">$ 132</h5>
                                <p class="mb-0 text-muted">Budget</p>
                            </div>
                        </div>

                    </div>
                    <!-- end task card -->

                    <div class="card task-box" id="intask-2">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#intask-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                    <a class="dropdown-item deletetask" href="#" data-id="#intask-2">Delete</a>
                                </div>
                            </div> <!-- end dropdown -->
                            <div class="float-end ms-2">
                                <span class="badge rounded-pill bg-warning-subtle text-warning font-size-12" id="task-status">Pending</span>
                            </div>
                            <div>
                                <h5 class="font-size-14"><a href="javascript: void(0);" class="text-dark" id="task-name">Create a Blog Template UI</a></h5>
                                <p class="text-muted mb-4">13 Oct, 2019</p>
                            </div>

                            <div class="avatar-group float-start task-assigne">
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-6">
                                        <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                        <img src="{{ URL::asset('assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-7">
                                        <img src="{{ URL::asset('assets/images/users/avatar-7.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block">
                                        <div class="avatar-sm">
                                            <span class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                3+
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="text-end">
                                <h5 class="font-size-15 mb-1" id="task-budget">$ 103</h5>
                                <p class="mb-0 text-muted">Budget</p>
                            </div>
                        </div>

                    </div>
                    <!-- end task card -->

                    <div class="card task-box" id="intask-3">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#intask-3" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                    <a class="dropdown-item deletetask" href="#" data-id="#intask-3">Delete</a>
                                </div>
                            </div> <!-- end dropdown -->
                            <div class="float-end ms-2">
                                <span class="badge rounded-pill bg-success-subtle text-success font-size-12" id="task-status">Complete</span>
                            </div>
                            <div>
                                <h5 class="font-size-14"><a href="javascript: void(0);" class="text-dark" id="task-name">Dason Dashboard UI</a></h5>
                                <p class="text-muted mb-4">13 Oct, 2019</p>
                            </div>

                            <div class="avatar-group float-start task-assigne">
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                        <img src="{{ URL::asset('assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                        <img src="{{ URL::asset('assets/images/users/avatar-5.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block">
                                        <div class="avatar-sm">
                                            <span class="avatar-title rounded-circle bg-primary text-white font-size-16">
                                                7+
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="text-end">
                                <h5 class="font-size-15 mb-1" id="task-budget">$ 94</h5>
                                <p class="mb-0 text-muted">Budget</p>
                            </div>
                        </div>

                    </div>
                    <!-- end task card -->

                </div>

                <div class="text-center d-grid">
                    <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-id="#inprogress-task"><i class="mdi mdi-plus me-1"></i> Add New</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-lg-4">
        <div class="border rounded p-4">
            <div class="dropdown float-end">
                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Delete</a>
                </div>
            </div> <!-- end dropdown -->

            <h4 class="card-title mb-4">Completed</h4>
            <div id="task-3">
                <div id="complete-task" class="pb-1 task-list">
                    <div class="card task-box" id="cmptask-1">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#cmptask-1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                    <a class="dropdown-item deletetask" href="#" data-id="#cmptask-1">Delete</a>
                                </div>
                            </div> <!-- end dropdown -->
                            <div class="float-end ms-2">
                                <span class="badge rounded-pill bg-success-subtle text-success font-size-12" id="task-status">Complete</span>
                            </div>
                            <div>
                                <h5 class="font-size-14"><a href="javascript: void(0);" class="text-dark" id="task-name">Redesign - Landing page</a></h5>
                                <p class="text-muted mb-4">10 Oct, 2019</p>
                            </div>

                            <div class="avatar-group float-start task-assigne">
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-1">
                                        <img src="{{ URL::asset('assets/images/users/avatar-1.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-2">
                                        <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-3">
                                        <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                            </div>

                            <div class="text-end">
                                <h5 class="font-size-15 mb-1" id="task-budget">$ 145</h5>
                                <p class="mb-0 text-muted">Budget</p>
                            </div>
                        </div>

                    </div>
                    <!-- end task card -->

                    <div class="card task-box" id="cmptask-2">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#cmptask-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                    <a class="dropdown-item deletetask" href="#" data-id="#cmptask-2">Delete</a>
                                </div>
                            </div> <!-- end dropdown -->
                            <div class="float-end ms-2">
                                <span class="badge rounded-pill bg-success-subtle text-success font-size-12" id="task-status">Complete</span>
                            </div>
                            <div>
                                <h5 class="font-size-14"><a href="javascript: void(0);" class="text-dark" id="task-name">Multipurpose Landing</a></h5>
                                <p class="text-muted">09 Oct, 2019</p>
                            </div>

                            <ul class="list-inline mb-4">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);">
                                        <div>
                                            <img src="{{ URL::asset('assets/images/small/img-4.jpg') }}" class="rounded" alt="" height="48">
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);">
                                        <div>
                                            <img src="{{ URL::asset('assets/images/small/img-5.jpg') }}" class="rounded" alt="" height="48">
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);">
                                        <div>
                                            <img src="{{ URL::asset('assets/images/small/img-6.jpg') }}" class="rounded" alt="" height="48">
                                        </div>
                                    </a>
                                </li>
                            </ul>

                            <div class="avatar-group float-start task-assigne">
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-4">
                                        <img src="{{ URL::asset('assets/images/users/avatar-4.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-5">
                                        <img src="{{ URL::asset('assets/images/users/avatar-5.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-6">
                                        <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block">
                                        <div class="avatar-sm">
                                            <span class="avatar-title rounded-circle bg-pink text-white font-size-16">
                                                5+
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="text-end">
                                <h5 class="font-size-15 mb-1" id="task-budget">$ 92</h5>
                                <p class="mb-0 text-muted">Budget</p>
                            </div>
                        </div>

                    </div>
                    <!-- end task card -->

                    <div class="card task-box" id="cmptask-3">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item edittask-details" href="#" id="taskedit" data-id="#cmptask-3" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Edit</a>
                                    <a class="dropdown-item deletetask" href="#" data-id="#cmptask-3">Delete</a>
                                </div>
                            </div> <!-- end dropdown -->
                            <div class="float-end ms-2">
                                <span class="badge rounded-pill bg-secondary-subtle text-secondary font-size-12" id="task-status">Waiting</span>
                            </div>
                            <div>
                                <h5 class="font-size-14"><a href="javascript: void(0);" class="text-dark" id="task-name">Dason landing Psd</a></h5>
                                <p class="text-muted mb-4">15 Oct, 2019</p>
                            </div>

                            <div class="avatar-group float-start task-assigne">
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-7">
                                        <img src="{{ URL::asset('assets/images/users/avatar-7.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block" value="member-8">
                                        <img src="{{ URL::asset('assets/images/users/avatar-8.jpg') }}" alt="" class="rounded-circle avatar-sm">
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block">
                                        <div class="avatar-sm">
                                            <span class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                2+
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="text-end">
                                <h5 class="font-size-15 mb-1" id="task-budget">$ 86</h5>
                                <p class="mb-0 text-muted">Budget</p>
                            </div>
                        </div>

                    </div>
                    <!-- end task card -->

                </div>

                <div class="text-center d-grid">
                    <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-id="#complete-task"><i class="mdi mdi-plus me-1"></i> Add New</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/dragula/dragula.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/jquery-validation/jquery-validation.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/task-kanban.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/task-form.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
