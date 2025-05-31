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
            <a href="{{ route('project.create') }}" class="btn btn-sm btn-outline-primary">
                <i class="fa fa-plus" aria-hidden="true"></i> Add
            </a>
            <!-- <a href="" class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-circle-minus" aria-hidden="true"></i> Trace
                                    </a> -->
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
                        <th>Project Name</th>
                        <th>created_by</th>
                        <th>start Date</th>
                        <th>End Date</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td> {{ $project->id }} </td>
                        <td> {{ $project->name }} </td>
                        <td> {{ $project->creator->name ?? 'A/N'}} </td>
                        <td> {{ $project->start_date }}</td>
                        <td> {{ $project->end_date }}</td>
                        <td><select class="form-select  status-select" data-id="{{ $project->id }}">
                                @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" {{ $project->status == $status->id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            @php
                            $encodedId = Crypt::encrypt($project->id);
                            @endphp
                            <a href="{{ route('project.edit', $encodedId) }}"><i
                                    class="fa-regular fa-pen-to-square fa-xl px-2"></i></a>
                            <a href="{{ route('project.delete', $project->id) }}"><i
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.status-select').change(function() {
            var id = $(this).data('id');
            document.body.classList.add('modal-open');
            var status = $(this).val();

            $.ajax({
                url: '{{ route("project.status", ":id") }}'.replace(':id', id),
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Status Updated',
                        text: response.message,
                        confirmButtonText: 'OK'
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON.message || 'An error occurred.',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
</script>
