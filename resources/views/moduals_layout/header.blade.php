<nav class="navbar navbar-expand-lg bg-body p-0">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" onclick="history.back(); return false;">
            <span class="ion--chevron-back"> </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="layout-menu-toggle navbar-nav align-items-center d-xl-none">
            <a class="nav-item nav-link px-0" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-end w-100">
            <ul class="navbar-nav flex-row align-items-center">
                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle pt-4 hide-arrow" href="#" id="checkDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="icon-park-outline--dot"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="checkDropdown">
                        <li><a class="dropdown-item" href="#"><i class="bx bx-log-in me-2"></i>Check In</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bx bx-log-out me-2"></i>Check Out</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle hide-arrow" href="#" id="notificationDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="position-relative">
                            <i class="bx bx-bell bx-sm"></i>
                            <span class="status-dot"></span>
                        </span>
                    </a>
                    @php
                        use App\Models\Task;
                        use Illuminate\Support\Facades\Auth;
                        $user = Auth::user();
                        $tasks = [];

                        if ($user && $user->role_id == 2) {
                            $tasks = Task::with(['project', 'assignedTo', 'creator', 'status'])
                                ->where('assigned_to', $user->id)
                                ->latest()
                                ->take(5)
                                ->get();
                        } else {
                            $tasks = Task::with(['project', 'assignedTo', 'creator', 'status'])
                                ->latest()
                                ->take(4)
                                ->get();
                        }
                    @endphp
                    <ul class="dropdown-menu dropdown-menu-end p-0 notification" aria-labelledby="notificationDropdown">
                        <li class="dropdown-menu-header border-bottom">
                            <div class="dropdown-header d-flex align-items-center py-3">
                                <h6 class="mb-0 me-auto">Assigned Task</h6>
                                <span class="badge bg-label-primary">{{ $tasks->count() }}</span>
                            </div>
                        </li>
                        <li class="dropdown-notifications-list scrollable-container">
                            <ul class="list-group list-group-flush">
                                @forelse ($tasks as $task)
                                    <li class="list-group-item dropdown-notifications-item p-3">
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="flex-shrink-0">
                                                <img src="{{ $task->assignedTo->getImageUrl() }}"
                                                    class="rounded-circle border" width="50" height="50"
                                                    alt="User Image">
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <h6 class="mb-1 fw-semibold">
                                                            {{ $task->assignedTo->name ?? 'Unknown' }}</h6>
                                                        <p class="mb-0 text-muted small">
                                                            {{ $task->title ?? 'Untitled Task' }}</p>
                                                    </div>
                                                    <div class="text-end">
                                                        <small
                                                            class="text-muted">{{ $task->created_at->diffForHumans() }}</small>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <small class="d-block text-body"><strong>Project:</strong>
                                                        {{ $task->project->name ?? 'N/A' }}</small>
                                                    <small class="d-block text-body"><strong>Status:</strong>
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
                                                <a href="javascript:void(0)" class="text-muted"><i
                                                        class="bx bx-x fs-5"></i></a>
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
                                    <a class="btn btn-sm btn-primary w-100" href="#"><small>View All Tasks</small></a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="#" id="profileDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar avatar-online">
                                @if (Auth::check())
                                    {!! Auth::user()->getImage() !!}
                                @else
                                    <img src="../default-avatar.png" class="w-px-40 h-auto rounded-circle" alt="Guest">
                                @endif
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-online me-3">
                                            @if (Auth::check())
                                                {!! Auth::user()->getImage() !!}
                                            @else
                                                <img src="../default-avatar.png" class="w-px-40 h-auto rounded-circle"
                                                    alt="Guest">
                                            @endif
                                        </div>
                                        @if (Auth::check())
                                            <div>
                                                <h6 class="mb-0 fw-semibold">{{ $user->name }}</h6>
                                                <small class="text-muted">
                                                    @if ($user->role_id == 1)
                                                        Admin
                                                    @elseif ($user->role_id == 3)
                                                        Manager
                                                    @else
                                                        Employee
                                                    @endif
                                                </small>
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                        class="bx bx-user me-2"></i>My Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('reset_password') }}"><i
                                        class="bx bx-cog me-2"></i>Reset Password</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                        class="bx bx-power-off me-2"></i>Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    