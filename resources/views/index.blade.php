@extends('layouts.main')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-4 col-lg-12 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <a href="{{ route('user.index') }}">
                                        <img src="{{ asset('assets/img/icons/unicons/user.webp') }}" alt="chart success"
                                            class="rounded" />
                                    </a>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Employees</span>
                            <h3 class="card-title mb-2">{{ \App\Models\User::all()->count() }}</h3>
                            <small class="text-success fw-semibold" data-bs-toggle="tooltip" title="Active">
                                <i class="bx bx-check-circle fs-5"></i>
                                {{ \App\Models\User::where('status', 1)->count() }}
                            </small>&nbsp;
                            <small class="text-danger fw-semibold fs-5" data-bs-toggle="tooltip" title="Inactive">
                                <i class="bx bx-x-circle"></i>
                                {{ \App\Models\User::where('status', 0)->count() }}
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <a href="{{ route('project.index') }}">
                                        <img src="{{ asset('assets/img/icons/unicons/project.webp') }}" alt="chart success"
                                            class="rounded" />
                                    </a>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Projects</span>
                            <h3 class="card-title mb-2">{{ \App\Models\Project::all()->count() }}</h3>
                            <small class="text-warning fw-semibold" data-bs-toggle="tooltip" title="Pending">
                                <i class="bx bx-loader-circle fs-5"></i>
                                {{ \App\Models\Project::where('status', 1)->count() }}
                            </small>&nbsp;
                            <small class="text-info fw-semibold fs-5" data-bs-toggle="tooltip" title="In Progress">
                                <i class="bx bx-time"></i>
                                {{ \App\Models\Project::where('status', 2)->count() }}
                            </small>&nbsp;
                            <small class="text-success fw-semibold fs-5" data-bs-toggle="tooltip" title="Completed">
                                <i class="bx bx-check-circle"></i>
                                {{ \App\Models\Project::where('status', 3)->count() }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-lg-12 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <a href="{{ route('project.index') }}">
                                        <img src="{{ asset('assets/img/icons/unicons/cc-warning.png') }}"
                                            alt="chart success" class="rounded" />
                                    </a>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Tasks</span>
                            <h3 class="card-title mb-2">{{ $taskes->count() }}</h3>
                            <small class="text-warning fw-semibold" data-bs-toggle="tooltip" title="Pending">
                                <i class="bx bx-loader-circle fs-5"></i> {{ $pendingCount }}
                            </small>&nbsp;
                            <small class="text-info fw-semibold fs-5" data-bs-toggle="tooltip" title="In Progress">
                                <i class="bx bx-time"></i> {{ $inProgressCount }}
                            </small>&nbsp;
                            <small class="text-success fw-semibold fs-5" data-bs-toggle="tooltip" title="Completed">
                                <i class="bx bx-check-circle"></i> {{ $completedCount }}
                            </small>
                            <small class="text-dark fw-semibold fs-5" data-bs-toggle="tooltip" title="Total Tasks">
                                <i class="bx bx-task"></i> {{ $totalCount }}
                            </small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/wallet-info.png" alt="wallet info"
                                        class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-1">Sales</p>
                            <h4 class="card-title mb-3">$4,679</h4>
                            <small class="text-success fw-medium"><i class="icon-base bx bx-up-arrow-alt"></i>
                                +28.42%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-lg-12 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success"
                                        class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-1">Profit</p>
                            <h4 class="card-title mb-3">$12,628</h4>
                            <small class="text-success fw-medium"><i class="icon-base bx bx-up-arrow-alt"></i>
                                +72.80%</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                <div class="avatar flex-shrink-0">
                                    <img src="../assets/img/icons/unicons/wallet-info.png" alt="wallet info"
                                        class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-1">Sales</p>
                            <h4 class="card-title mb-3">$4,679</h4>
                            <small class="text-success fw-medium"><i class="icon-base bx bx-up-arrow-alt"></i>
                                +28.42%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xxl-12 order-2 order-md-3 order-xxl-2 mb-6 total-revenue">
            <div class="card">
                <div class="card-body">
                    <table id="example" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>address</th>
                                <th>number</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Start date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{!! $user->getImage() !!}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->number }}</td>
                                    <td>
                                    @if (Auth::check())
                                        @php $roleId = Auth::user()->role_id; @endphp

                                        @if (in_array($roleId, [1, 3]))
                                            <div class="form-check form-switch">
                                                <input class="form-check-input status-toggle" type="checkbox"
                                                    id="toggle-status-{{ $user->id }}" data-id="{{ $user->id }}"
                                                    {{ $user->status === 1 ? 'checked' : '' }}>
                                            </div>
                                        @elseif ($roleId == 2)
                                            <div class="form-check form-switch">
                                                <input class="form-check-input status-toggle" type="checkbox" disabled
                                                    id="toggle-status-{{ $user->id }}" data-id="{{ $user->id }}"
                                                    {{ $user->status === 1 ? 'checked' : '' }}>
                                            </div>
                                        @else
                                            <div class="form-check form-switch">
                                                <input class="form-check-input status-toggle" type="checkbox"
                                                    id="toggle-status-{{ $user->id }}" data-id="{{ $user->id }}"
                                                    {{ $user->status === 1 ? 'checked' : '' }}>
                                            </div>
                                        @endif
                                    @endif
                                </td>
                                    <td>
                                        @if ($user->role_id == 1)
                                            <span class="badge rounded-pill text-bg-primary">Admin</span>
                                        @elseif($user->role_id == 3)
                                            <span class="badge rounded-pill text-bg-warning">Manager</span>
                                        @else
                                            <span class="badge rounded-pill text-bg-secondary">Employee</span>
                                    </td>
                            @endif
                            <td>{{ $user->created_at }}</td>
                            <td>
                                @php
                                    $encodedId = Crypt::encrypt($user->id);
                                @endphp
                                <a href="{{ route('user.edit', $encodedId) }}"><i
                                        class="fa-regular fa-pen-to-square fa-xl"></i></a>
                                <a href="{{ route('user.delete', $user->id) }}"><i
                                        class="fa-regular fa-trash-can fa-xl"></i></a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="mb-1 me-2">Total Task</h5>
                        <p class="card-subtitle"> {{ \App\Models\Task::count() }}</p>
                    </div>
                    <div class="dropdown">
                        <button class="btn text-body-secondary p-0" type="button" id="orederStatistics"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-base bx bx-dots-vertical-rounded icon-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-6">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h3 class="mb-1">{{ \App\Models\Task::count() }}</h3>
                            <small>Total Task </small>
                        </div>
                        <div id="orderStatisticsChart"></div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex align-items-center mb-5">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="icon-base bx bx-task"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Open Task</h6>
                                    <small>{{ \App\Models\Task::where('status', '1')->count() }}</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">{{ \App\Models\Task::where('status', '1')->count() }}</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-5">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-warning"><i
                                        class="icon-base qlementine-icons--task-soon-16"></i></span>

                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">In Progress</h6>
                                    <small>{{ \App\Models\Task::where('status', '2')->count() }}</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">{{ \App\Models\Task::where('status', '2')->count() }}</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-5">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-danger"><i
                                        class="icon-base qlementine-icons--task-past-16"></i></span>

                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Cancelled</h6>
                                    <small>{{ \App\Models\Task::where('status', '3')->count() }}</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">{{ \App\Models\Task::where('status', '3')->count() }}</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success"><i
                                        class="icon-base material-symbols--task"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Completed</h6>
                                    <small>{{ \App\Models\Task::where('status', '4')->count() }}</small>


                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">{{ \App\Models\Task::where('status', '4')->count() }}</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-6">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="mb-1 me-2">Total Project</h5>
                        <p class="card-subtitle"> {{ \App\Models\project::count() }}</p>
                    </div>
                    <div class="dropdown">
                        <button class="btn text-body-secondary p-0" type="button" id="orederStatistics"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-base bx bx-dots-vertical-rounded icon-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-6">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h3 class="mb-1">{{ \App\Models\project::count() }}</h3>
                            <small>Total Project </small>
                        </div>
                        <div id="projectStatusChart" style="width: 210px;height:133px;"></div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex align-items-center mb-5">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i
                                        class="icon-base grommet-icons--projects"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Open Project</h6>
                                    <small>{{ \App\Models\project::where('status', '1')->count() }}</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">{{ \App\Models\project::where('status', '1')->count() }}</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-5">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-warning"><i
                                        class="icon-base qlementine-icons--task-soon-16"></i></span>

                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">In Progress</h6>
                                    <small>{{ \App\Models\Project::where('status', '2')->count() }}</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">{{ \App\Models\project::where('status', '2')->count() }}</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-5">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-danger"><i
                                        class="icon-base qlementine-icons--task-past-16"></i></span>

                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Cancelled</h6>
                                    <small>{{ \App\Models\project::where('status', '3')->count() }}</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">{{ \App\Models\project::where('status', '3')->count() }}</h6>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success"><i
                                        class="icon-base material-symbols--task"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Completed</h6>
                                    <small>{{ \App\Models\project::where('status', '4')->count() }}</small>
                                </div>
                                <div class="user-progress">
                                    <h6 class="mb-0">{{ \App\Models\project::where('status', '4')->count() }}</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 order-1 mb-6">
            <div class="card h-100">
                <div class="card-header nav-align-top">
                    <ul class="nav nav-pills flex-wrap row-gap-2" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-tabs-line-card-income" aria-controls="navs-tabs-line-card-income"
                                aria-selected="true">
                                Income
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab">Expenses</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab">Profit</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                            <div class="d-flex mb-6">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="../assets/img/icons/unicons/wallet.png" alt="User" />
                                </div>
                                <div>
                                    <p class="mb-0">Total Balance</p>
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">$459.10</h6>
                                        <small class="text-success fw-medium">
                                            <i class="icon-base bx bx-chevron-up icon-lg"></i>
                                            42.9%
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div id="incomeChart"></div>
                            <div class="d-flex align-items-center justify-content-center mt-6 gap-3">
                                <div class="flex-shrink-0">
                                    <div id="expensesOfWeek"></div>
                                </div>
                                <div>
                                    <h6 class="mb-0">Income this week</h6>
                                    <small>$39k less than last week</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 order-2 mb-6">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Transactions</h5>
                    <div class="dropdown">
                        <button class="btn text-body-secondary p-0" type="button" id="transactionID"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-base bx bx-dots-vertical-rounded icon-lg"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <ul class="p-0 m-0">
                        <li class="d-flex align-items-center mb-6">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="d-block">Paypal</small>
                                    <h6 class="fw-normal mb-0">Send money</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-2">
                                    <h6 class="fw-normal mb-0">+82.6</h6>
                                    <span class="text-body-secondary">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-6">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="d-block">Wallet</small>
                                    <h6 class="fw-normal mb-0">Mac'D</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-2">
                                    <h6 class="fw-normal mb-0">+270.69</h6>
                                    <span class="text-body-secondary">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-6">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/chart.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="d-block">Transfer</small>
                                    <h6 class="fw-normal mb-0">Refund</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-2">
                                    <h6 class="fw-normal mb-0">+637.91</h6>
                                    <span class="text-body-secondary">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-6">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/cc-primary.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="d-block">Credit Card</small>
                                    <h6 class="fw-normal mb-0">Ordered Food</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-2">
                                    <h6 class="fw-normal mb-0">-838.71</h6>
                                    <span class="text-body-secondary">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-6">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="d-block">Wallet</small>
                                    <h6 class="fw-normal mb-0">Starbucks</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-2">
                                    <h6 class="fw-normal mb-0">+203.33</h6>
                                    <span class="text-body-secondary">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/cc-warning.png" alt="User" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="d-block">Mastercard</small>
                                    <h6 class="fw-normal mb-0">Ordered Food</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-2">
                                    <h6 class="fw-normal mb-0">-92.45</h6>
                                    <span class="text-body-secondary">USD</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
            chart: {
                type: 'donut',
                height: 170
            },
            labels: ['Open', 'In Progress', 'Cancelled', 'Completed'],
            series: [
                {{ \App\Models\project::where('status', '1')->count() }},
                {{ \App\Models\project::where('status', '2')->count() }},
                {{ \App\Models\project::where('status', '3')->count() }},
                {{ \App\Models\project::where('status', '4')->count() }}
            ],
            colors: ['#696CFF', '#FFAB00', '#FF4C51', '#71DD37'],
            legend: {
                position: 'bottom'
            }
        };

        var chart = new ApexCharts(document.querySelector("#projectStatusChart"), options);
        chart.render();
    </script>
@endsection
