@extends('layouts.main')
@section('title')
    Project Index
@endsection
@section('content')
    <div class="container card shadow-md mb-4">
        <div class="d-flex justify-content-between align-items-center ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb px-4 pt-3">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard/index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Project</li>
                </ol>
            </nav>
            <div class="mx-3">
                <a href="{{ route('project-status.create') }}" class="btn btn-sm btn-outline-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        @include('admin.error.messages')
        <div class="card">
            <div class="card-body">
                <table id="example" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Status Name</th>
                            <th>created_by</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project_status as $status)
                            <tr>
                                <td>{{ $status->id }}</td>
                                <td>{{ $status->name }}</td>
                                <td>{{ $status->created_at }}</td>
                                <td>
                                    <a href="{{ route('project-status.edit', $status->id) }}"><i
                                            class="fa-regular fa-pen-to-square fa-xl px-2"></i></a>
                                    <a href="{{ route('project-status.destroy', $status->id) }}"><i
                                            class="fa-regular fa-trash-can fa-xl"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('customScript')
    @if (session('success'))
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.success("{{ session('success') }}");
            });
        </script>
    @endif
@endsection
