@extends('layouts.main')
@section('title')
    Add Meta
@endsection
@section('content')
    <div class="container card shadow-md mb-4">
        <div class="d-flex justify-content-between align-items-center ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb px-4 pt-3">
                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Project</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
            <a href="" class="btn btn-sm btn-outline-danger mx-3">Back</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-12 ">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('meta.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="Page Name">Page Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="page_name" class="form-control" value="{{ old('page_name') }}">
                                @error('page_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="Meta Title">Meta Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="meta_title" class="form-control"
                                    value="{{ old('meta_title') }}">
                                @error('meta_title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="discription">Meta discription <span
                                        class="text-danger">*</span></label>
                                <textarea type="text" class="form-control" name="discription" id="editor"
                                    placeholder="Enter Project discription..." value="{{ old('description') }}" rows="6" cols="70"></textarea>
                                @error('discription')
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
