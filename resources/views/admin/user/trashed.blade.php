@extends('layouts.main')

@section('title')
    User Index
@endsection

@section('content')
    <div class="container card shadow-md mb-4">
        <div class="d-flex justify-content-between align-items-center ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb px-4 pt-3">
                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
            </nav>
            <div class="mx-3">
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-outline-danger mx-3">Back</a>
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
                        @foreach ($deletedUsers as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{!! $user->getImage() !!}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->number }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input status-toggle" type="checkbox"
                                            id="toggle-status-{{ $user->id }}" data-id="{{ $user->id }}"
                                            {{ $user->status === 1 ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    @if ($user->role_id == 1)
                                        <span class="badge rounded-pill text-bg-primary">Admin</span>
                                    @else
                                        <span class="badge rounded-pill text-bg-secondary">Employee</span>
                                </td>
                        @endif
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a href="{{ route('user.restore', $user->id) }}"><i class="ic--baseline-restore "></i></a>
                            <a href="{{ route('user.delete', $user->id) }}"><i
                                    class="material-symbols--delete-outline"></i></a>
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
