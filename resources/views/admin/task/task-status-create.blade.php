@extends('layouts.main')
@section('title')
    Create Task Status
@endsection
@section('content')
    <div class="container card shadow-md mb-4">
        <div class="d-flex justify-content-between align-items-center ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb px-4 pt-3">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard/index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('task.index') }}">Task</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Status</li>
                </ol>
            </nav>
            <a href="{{ route('task-status.index') }}" class="btn btn-sm btn-outline-danger mx-3">Back</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-12 ">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('task-status.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="name">Status Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Status Name..."
                                    value="{{ old('name') }}">

                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-sm btn-primary me-3">Save</button>
                                <button type="reset" class="btn btn-sm btn-dark">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
