@extends('moduals_layout.main')
@section('title')
    Project
@endsection
@section('content')
    <nav class="navbar bg-body">
        <div class="container-fluid p-0">
            <a class="navbar-brand">
                <h5 class="fw-bold">Project </h5>
            </a>
            <div class="d-flex justify-contant-center me-auto ms-auto">
                <form class="" role="search" style="width:600px;">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                </form>
            </div>
        </div>
    </nav>
    @php
        use App\Models\Project;
    @endphp
    <div class="row">
        <div class="col-xxl-6">
            <div class="row d-flex justify-content-between">
                <div class="col-md-3" style="width: 30%;">
                    <div class="d-flex align-items-center text-start">
                        <h1 class="fw-bold fs-5">To Do</h1>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-xxl-10">
                            <div class="bg-dark p-1"></div>
                        </div>
                        <div class="col-xxl-2">
                            <p class="fs-6 fw-5">
                                {{ \App\Models\Project::where('status', 1)->count() }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="width: 30%;">
                    <div class="d-flex align-items-center text-start">
                        <h1 class="fw-bold fs-5">In Progress</h1>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-xxl-10">
                            <div class="bg-dark p-1"></div>
                        </div>
                        <div class="col-xxl-2">
                            <p class="fs-6 fw-5">
                                {{ \App\Models\Project::where('status', 2)->count() }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="width: 30%;">
                    <div class="d-flex align-items-center text-start">
                        <h1 class="fw-bold fs-5">Closed</h1>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-xxl-10">
                            <div class="bg-dark p-1"></div>
                        </div>
                        <div class="col-xxl-2">
                            <p class="fs-6 fw-5">
                                {{ \App\Models\Project::where('status', 4)->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6">
        </div>
    </div>
    <div class="row d-flex justify-content-between py-2 overflow-auto" style="height: 80vh;">
        <div class="col-xxl-6 d-flex flex-wrap justify-content-between">
            <div class="col-md-3 p-3" style="width: 30%;">
                @php
                    $todoProjects = \App\Models\Project::where('status', 1)->with('creator')->withCount('tasks')->get();
                @endphp
                @foreach ($todoProjects as $project)
                    @include('admin.module.project-status', ['project' => $project])
                @endforeach
            </div>
            <div class="col-md-3 p-3" style="width: 30%;">
                @php
                    $inProgressProjects = \App\Models\Project::where('status', 2)
                        ->with('creator')
                        ->withCount('tasks')
                        ->get();
                @endphp
                @foreach ($inProgressProjects as $project)
                    @include('admin.module.project-status', ['project' => $project])
                @endforeach
            </div>
            <div class="col-md-3 p-3" style="width: 30%;">
                @php
                    $completedProjects = \App\Models\Project::where('status', 4)
                        ->with('creator')
                        ->withCount('tasks')
                        ->get();
                @endphp
                @foreach ($completedProjects as $project)
                    @include('admin.module.project-status', ['project' => $project])
                @endforeach
            </div>

        </div>
        <div class="col-xxl-6">
        </div>
    </div>
@endsection
