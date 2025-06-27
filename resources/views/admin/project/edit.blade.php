@extends('layouts.main')
@section('title')
    Update Project
@endsection
@section('content')
    <div class="container card shadow-md mb-4">
        <div class="d-flex justify-content-between align-items-center ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb px-4 pt-3">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard/index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Project</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                </ol>
            </nav>
            <a href="{{ route('project.index') }}" class="btn btn-sm btn-outline-danger mx-3">Back</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-12 ">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('project.update', ['encodedId' => Crypt::encrypt($project->id)]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $project->id }}">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="created_by">
                                    Created By <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" name="created_by" id="created_by" disabled>
                                    @foreach ($created_by as $creator)
                                        <option value="{{ $creator->id }}"
                                            {{ $project->created_by == $creator->id ? 'selected' : '' }}>
                                            {{ $creator->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="created_by" value="{{ $project->created_by }}">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="name">Project Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="Enter Project Name..." value="{{ $project->name }}" />
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="start_date">Start Date <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="start_date" placeholder="Select Date..."
                                    value="{{ $project->start_date }}" />
                                @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="End Date">End Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="end_date" placeholder="Select End Date..."
                                    value="{{ $project->end_date }}" />
                                @error('end_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12  mb-3">
                                <label class="form-label" for="Description">Description <span
                                        class="text-danger">*</span></label>
                                <textarea type="text" class="form-control" name="description" id="editor"
                                    placeholder="Enter Project Description..." rows="4" cols="50" value="{{ $project->description }}"> {{ $project->description }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-sm btn-primary me-3">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
