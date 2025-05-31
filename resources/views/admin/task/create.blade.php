@extends('layouts.main')
@section('title')
  Task Create
@endsection

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('content')
  <div class="container card shadow-md mb-4">
    <div class="d-flex justify-content-between align-items-center ">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb px-4 pt-3">
      <li class="breadcrumb-item"><a href="{{ route('dashboard/index') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('task.index') }}">Task</a></li>
      <li class="breadcrumb-item active" aria-current="page">Create</li>
      </ol>
    </nav>
    <a href="{{ route('task.index') }}" class="btn btn-sm btn-outline-danger mx-3">Back</a>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-xl-12 ">
    <div class="card mb-4">
      <div class="card-body">
      <form action="{{ route('task.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-4 mb-3">
          <label class="form-label" for="created_by">
          Created By <span class="text-danger">*</span>
          </label>
          <select class="form-select" name="created_by_display" id="created_by" disabled>
          <option value="{{ $created_by->id }}" selected>{{ $created_by->name }}</option>
          </select>
          <input type="hidden" name="created_by" value="{{ $created_by->id }}">
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label" for="basic-default-image">
          Project Name <span class="text-danger">*</span>
          </label>
          <select class="form-select" aria-label="Default select example" name="project_id">
          <option selected disabled>-- Project select --</option>
          @foreach ($projects as $project)
        <option value="{{ $project->id}}">{{ $project->name }}</option>
      @endforeach
          </select>
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label" for="assigned-to-select">
          Assigned <span class="text-danger">*</span>
          </label>
          <select class="form-select " id="assigned-to-select" name="assigned_to">
          
          @foreach ($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
      @endforeach
          </select>
        </div>

        </div>
        <div class="row">
        <div class="col-md-4 mb-3">
          <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="title" placeholder="Enter  title..."
          value="{{ old('title') }}" />
          @error('title')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label" for="date">Start Date <span class="text-danger">*</span></label>
          <input type="date" class="form-control" name="start_date" placeholder="Enter Start Date..."
          value="{{ old('start_date') }}" />
          @error('start_date')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label" for="title">Deu Date <span class="text-danger">*</span></label>
          <input type="date" class="form-control" name="due_date" placeholder="Enter Date..."
          value="{{ old('due_date') }}" />
          @error('due_date')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>

        </div>
        <div class="row">
        <div class="col-md-12 mb-3">
          <label class="form-label" for="Description">Description <span class="text-danger">*</span></label>
          <textarea type="text" class="form-control" name="description" id="editor"
          placeholder="Enter Project Description..." value="{{ old('description') }}" rows="6"
          cols="70"></textarea>
          @error('description')
        <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
        </div>
        <div class="row">
        <div class="col-md-12 text-center mt-3">
          <button href="{{ route('sendEmail.index') }}" type="submit" class="btn btn-sm btn-primary me-3">Save</button>
          <button type="reset" class="btn btn-sm btn-dark">Reset</button>
        </div>
        </div>
      </form>
      </div>
    </div>
    </div>
  </div>
  </div>

  <script>
    $(document).ready(function () {
    $('.js-example-placeholder-multiple').select2({
      placeholder: "Select a user",
      allowClear: true
    });
    });
  </script>


@endsection
