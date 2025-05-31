<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                    aria-label="Search..." />
            </div>
        </div>
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item dropdown me-4">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-expanded="true">
                    <span class="position-relative">
                        <i class="icon-base bx bx-bell icon-md"></i>
                        <span class="status-dot"></span>
                    </span>
                </a>
                @php
                    use App\Models\Task;
                    use App\Models\User;
                    use Illuminate\Support\Facades\Auth;
                    $user = Auth::user();
                    $tasks = [];
                    if ($user && $user->role_id == 2) {
                        $tasks = Task::with(['project', 'assignedTo', 'creator', 'status'])->where('assigned_to', $user->id)->latest()->take(10)->get();
                    } else {
                        $tasks = Task::with(['project', 'assignedTo', 'creator', 'status'])->latest()->take(4)->get();
                    }
                @endphp
                <ul class="dropdown-menu dropdown-menu-end p-0 notification" data-bs-popper="static">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h6 class="mb-0 me-auto">Assigned Task</h6>
                            <div class="d-flex align-items-center h6 mb-0">
                                <span class="badge bg-label-primary me-2">{{ $tasks->count() }}</span>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container ps ps--active-y">
                        <ul class="list-group list-group-flush">
                            @forelse ($tasks as $task)
                                <li class="list-group-item dropdown-notifications-item p-3">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="flex-shrink-0">
                                            <img src="{{ $task->assignedTo->getImageUrl() }}" alt="User Image"
                                                class="rounded-circle border" width="50" height="50">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6 class="mb-1 fw-semibold">
                                                        {{ $task->assignedTo->name ?? 'Unknown User' }}</h6>
                                                    <p class="mb-0 text-muted small">
                                                        {{ $task->title ?? 'Untitled Task' }}</p>
                                                </div>
                                                <div class="text-end">
                                                    <small
                                                        class="text-body-secondary">{{ $task->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <small class="d-block text-body"><strong>Project:</strong>
                                                    {{ $task->project->name ?? 'N/A' }}</small>
                                                <small class="d-block text-body">
                                                    <strong>Status:</strong>
                                                    @switch($task->status)
                                                        @case(1)
                                                            <span class="badge bg-secondary">Open</span>
                                                        @break

                                                        @case(2)
                                                            <span class="badge bg-primary">In Progress</span>
                                                        @break

                                                        @case(3)
                                                            <span class="badge bg-warning text-dark">Completed</span>
                                                        @break

                                                        @case(4)
                                                            <span class="badge bg-success">On Hold</span>
                                                        @break

                                                        @default
                                                            <span class="badge bg-dark">Unknown</span>
                                                    @endswitch
                                                </small>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <a href="javascript:void(0)" class="text-muted" title="Dismiss">
                                                <i class="bx bx-x fs-5"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                    <li class="list-group-item text-center text-muted">No tasks assigned.</li>
                                @endforelse
                            </ul>
                        </li>
                        <li class="border-top">
                            <div class="d-grid p-3">
                                <a class="btn btn-sm btn-primary w-100" href="">
                                    <small>View All Tasks</small>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-online">
                            @if (Auth::check())
                                {!! Auth::user()->getImage() !!}
                            @else
                                <img src="../default-avatar.png" alt="Guest" class="w-px-40 h-auto rounded-circle" />
                            @endif
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-online me-3">
                                        @if (Auth::check())
                                            {!! Auth::user()->getImage() !!}
                                        @else
                                            <img src="../default-avatar.png" alt="Guest"
                                                class="w-px-40 h-auto rounded-circle" />
                                        @endif
                                    </div>
                                    <div>
                                        @if (Auth::check())
                                            <span>{{ Auth::user()->name }}</span>
                                        @else
                                            <span>Guest</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bx bx-user me-2"></i>My
                                Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('reset_password') }}"><i
                                    class="bx bx-cog me-2"></i>Reset Password</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="bx bx-power-off me-2"></i>Log
                                Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
