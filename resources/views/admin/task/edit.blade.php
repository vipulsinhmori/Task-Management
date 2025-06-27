@extends('layouts.main')
@section('title')
    Edit Task
@endsection
@section('content')
    <div class="container card shadow-md mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb px-4 pt-3">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('task.index') }}">Task</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
            <a href="{{ route('task.index') }}" class="btn btn-sm btn-outline-danger mx-3">Back</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('task.update', ['encodedId' => Crypt::encrypt($task->id)]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Project Name <span class="text-danger">*</span></label>
                                <select class="form-select" name="project_id">
                                    <option disabled>-- Select Project --</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}"
                                            {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}>
                                            {{ $project->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('project_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Assigned To <span class="text-danger">*</span></label>
                                <select class="form-select" name="assigned_to">
                                    <option disabled>-- Select User --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('assigned_to', $task->assigned_to) == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('assigned_to')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Created By</label>
                                <select class="form-select" name="created_by" disabled>
                                    @foreach ($creators as $creator)
                                        <option value="{{ $creator->id }}"
                                            {{ $task->created_by == $creator->id ? 'selected' : '' }}>
                                            {{ $creator->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Start Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="start_date"
                                    value="{{ old('start_date', $task->start_date) }}" />
                                @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title"
                                    value="{{ old('title', $task->title) }}" />
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Due Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="due_date"
                                    value="{{ old('due_date', $task->due_date) }}" />
                                @error('due_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" rows="6" id="editor">{{ old('description', $task->description) }}</textarea>
                                @error('description')
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
@endsection
