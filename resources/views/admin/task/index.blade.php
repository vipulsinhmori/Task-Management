@extends('layouts.main')
@section('title')
    Task index
@endsection
@section('content')
    <div class="container card shadow-md mb-4">
        <div class="d-flex justify-content-between align-items-center ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb px-4 pt-3">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard/index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Task</li>
                </ol>
            </nav>
            <div class="mx-3">
                <a href="{{ route('task.create') }}" class="btn btn-sm btn-outline-primary">
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
                            <th>Task Name</th>
                            <th>Project Name</th>
                            <th>Assigned To</th>
                            <th>Created By</th>
                            <th> Start Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskes as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->project->name ?? 'N/A' }}</td>
                                <td>{{ $task->assignedTo->name ?? 'N/A' }}</td>
                                <td>{{ $task->creator->name ?? 'N/A' }}</td>
                                <td> {{ $task->start_date }}</td>
                                <td>
                                    <select class="form-select status-select" data-id="{{ $task->id }}">
                                        @foreach ($statues as $status)
                                            <option value="{{ $status->id }}"
                                                {{ $task->status == $status->id ? 'selected' : '' }}>
                                                {{ $status->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn text-primary pe-2" data-bs-toggle="modal"
                                        data-bs-target="#viewModal{{ $task->id }}">
                                        <span class="lets-icons--view"></span>
                                    </button>
                                    @php
                                        $encodedId = Crypt::encrypt($task->id);
                                    @endphp
                                    <a href="{{ route('task.edit', $encodedId) }}"><i
                                            class="fa-regular fa-pen-to-square fa-xl px-2"></i></a>
                                    <a href="{{ route('task.delete', $task->id) }}"><i
                                            class="fa-regular fa-trash-can fa-xl"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @foreach ($taskes as $task)
        <div class="modal fade" id="viewModal{{ $task->id }}" tabindex="-1"
            aria-labelledby="modalLabel{{ $task->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalLabel{{ $task->id }}">Task View - {{ $task->title }}
                        </h1>
                    </div>

                    <div class="modal-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-4 text-secondary">Task Information</h5>
                            @php
                                $encodedId = Crypt::encrypt($task->id);
                            @endphp
                            <a href="{{ route('task.edit', $encodedId) }}"><i
                                    class="fa-regular fa-pen-to-square fa-xl px-2"></i></a>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <h5 class="text-secondary">Project Detail</h5>
                            <div class="col-sm-4">
                                <label class="col-form-label font-weight-bold">Project ID:</label>
                                <p class="text-muted">{{ $task->project->id ?? 'N/A' }}</p>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label font-weight-bold">Create By: </label>
                                <p class="text-muted">{{ $task->creator->name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label font-weight-bold">Project Status:</label>
                                <p class="text-muted">
                                    @switch($task->project->status)
                                        @case(1)
                                            <span class="badge rounded-pill text-bg-secondary">Open</span>
                                        @break

                                        @case(2)
                                            <span class="badge rounded-pill text-bg-primary">IN Progress</span>
                                        @break

                                        @case(3)
                                            <span class="badge rounded-pill text-bg-warning">Completed</span>
                                        @break

                                        @case(4)
                                            <span class="badge rounded-pill text-bg-success">On Hold</span>
                                        @break

                                        @default
                                            <span class="badge rounded-pill text-bg-secondary">Unknown</span>
                                    @endswitch
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label font-weight-bold">Project Name:</label>
                                <p class="text-muted">{{ $task->project->name }}</p>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label font-weight-bold">Start Date:</label>
                                <p class="text-muted">{{ $task->project->start_date }}</p>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label font-weight-bold">End Date:</label>
                                <p class="text-muted">{{ $task->project->end_date }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <h5 class="text-secondary">Task Detail</h5>
                            <div class="col-sm-4">
                                <label class="col-form-label font-weight-bold">Task ID:</label>
                                <p class="text-muted">{{ $task->id }}</p>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label font-weight-bold">Assigned To: </label>
                                <p class="text-muted">{{ $task->assignedTo->name ?? 'N/A' }}</p>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label font-weight-bold">Task Status:</label>
                                <p class="text-muted">
                                    @switch($task->status)
                                        @case(1)
                                            <span class="badge rounded-pill text-bg-secondary">Open</span>
                                        @break

                                        @case(2)
                                            <span class="badge rounded-pill text-bg-primary">In Progress</span>
                                        @break

                                        @case(3)
                                            <span class="badge rounded-pill text-bg-danger">Cancelled</span>
                                        @break

                                        @case(4)
                                            <span class="badge rounded-pill text-bg-success">Completed</span>
                                        @break

                                        @default
                                            <span class="badge rounded-pill text-bg-secondary">Unknown</span>
                                    @endswitch
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label font-weight-bold">Task Name:</label>
                                <p class="text-muted">{{ $task->title }}</p>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label font-weight-bold">Start Date:</label>
                                <p class="text-muted">{{ $task->start_date }}</p>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label font-weight-bold">End Date:</label>
                                <p class="text-muted">{{ $task->due_date }}</p>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h5 class="text-secondary">Task Information </h5>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <p class="text-muted">{!! $task->description !!}</p>
                            </div>
                        </div>
                        @if (Auth::user()->role_id == 2)
                            <hr class="my-4">
                            <h5 class="text-secondary">Set Task-Time</h5>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    @if (empty($task->task_time))
                                        <a href="{{ route('task.start', $task->id) }}"
                                            class="btn btn-sm btn-outline-primary">Start</a>
                                    @elseif (!empty($task->task_time) && empty($task->end_time))
                                        <a href="{{ route('task.end', $task->id) }}"
                                            class="btn btn-sm btn-outline-danger mx-2">Stop</a>
                                    @else
                                        <span class="text-success">Task Completed</span>
                                    @endif
                                </div>
                            </div>
                            <div class="pt-3">
                                <p>{{ $task->duration }}</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        </div>
    @endforeach
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
                url: '{{ route('task.status', ':id') }}'.replace(':id', id),
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
