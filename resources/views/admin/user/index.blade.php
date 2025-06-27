@extends('layouts.main')
@foreach($meta as $metas)
@section('title')
    {{ $metas->meta_title }}
@endsection
@section('meta_description')  
 {!! $metas->discription !!}
@endsection
    @endforeach
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
                  <a href="{{ route('role.create') }}" class="btn btn-sm btn-outline-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i>Role
                </a>
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-outline-primary">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add
                </a>
                <a href="{{ route('user.trashed') }}" class="btn btn-sm btn-outline-danger">
                    <i class="fa fa-circle-minus" aria-hidden="true"></i> Trash
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
                                    @elseif ($user->role_id == 2)
                                        <span class="badge rounded-pill text-bg-secondary">Employee</span>
                                    @else
                                        <span class="badge rounded-pill text-bg-warning">Manager</span>
                                    @endif
                                </td>
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
