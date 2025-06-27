<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard/index') }}" class="app-brand-link">
            <span class="app-brand-logo demo"></span>
            <span class="app-brand-text demo text-heading fw-bold">
                <img src="/assets/img/avatars/download.jpeg" height="100" width="200">
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
        </a>
    </div>
    <div class="menu-divider mt-0"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->routeIs('dashboard/index') ? 'active open' : '' }}">
            <a href="{{ route('dashboard/index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('user.index', 'user.create') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon bx bx-user"></i>
                <div data-i18n="Users">Users</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('user.index') ? 'active ' : '' }}">
                    <a href="{{ route('user.index') }}" class="menu-link">
                        <div data-i18n="User List">User List</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('user.create') ? 'active' : '' }}">
                    <a href="{{ route('user.create') }}" class="menu-link">
                        <div data-i18n="Add User">Add User</div>
                    </a>
                </li>

            </ul>
        </li>
        @php
            $roleId = Auth::check() ? Auth::user()->role_id : null;
        @endphp
        @if ($roleId !== 2)
            <li
                class="menu-item {{ request()->routeIs('project.index', 'project.create', 'project-status.index') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon bx bx-folder"></i>
                    <div data-i18n="Projects">Projects</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('project.index') ? 'active' : '' }}">
                        <a href="{{ route('project.index') }}" class="menu-link">
                            <div data-i18n="Project List">Project List</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('project.create') ? 'active' : '' }}">
                        <a href="{{ route('project.create') }}" class="menu-link">
                            <div data-i18n="Add Project">Add Project</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('project-status.index') ? 'active' : '' }}">
                        <a href="{{ route('project-status.index') }}" class="menu-link">
                            <div data-i18n="Project Status">Add Project Status</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <li
            class="menu-item {{ request()->routeIs('task.index', 'task.create', 'task-status.index') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon bx bx-task"></i>
                <div data-i18n="Tasks">Tasks</div>
            </a>
            <ul class="menu-sub  {{ request()->routeIs('task.index') ? 'active open' : '' }}">
                <li class="menu-item">
                    <a href="{{ route('task.index') }}" class="menu-link">
                        <div data-i18n="Task List">Task List</div>
                    </a>
                </li>
                <li class="menu-item  {{ request()->routeIs('task.create') ? 'active open' : '' }}">
                    <a href="{{ route('task.create') }}" class="menu-link">
                        <div data-i18n="Add Task">Add Task</div>
                    </a>
                </li>
                <li class="menu-item  {{ request()->routeIs('task-status.index') ? 'active open' : '' }}">
                    <a href="{{ route('task-status.index') }}" class="menu-link">
                        <div data-i18n="Task Status">Add Task Status</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->routeIs('login') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon bx bx-lock-alt"></i>
                <div data-i18n="Authentications">Authentications</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">

                </li>
                <li class="menu-item">
                    <a href="{{ route('registration') }}" class="menu-link">
                        <div data-i18n="Register">Register</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('reset_password') }}" class="menu-link">
                        <div data-i18n="Reset Password">Reset Password</div>
                    </a>
                </li>
                  <li class="menu-item">
                    <a href="{{ route('meta.index')}}" class="menu-link">
                        <div data-i18n="Reset Password">Add Page Meta</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item  {{ request()->routeIs('dashboard/profile') ? 'active open' : '' }}">
            <a href="{{ route('dashboard/profile') }}" class="menu-link">
                <i class="menu-icon bx bx-user me-2"></i>
                <div data-i18n="Profile">Profile</div>
            </a>
        </li>
          <li class="menu-item  {{ request()->routeIs('moduals') ? 'active open' : '' }}">
            <a href="{{ route('moduals') }}" class="menu-link">
                <i class="menu-icon streamline-plump--module me-2"></i>
                <div data-i18n="Logout">Moduals</div>
            </a>
        </li>
    

        <li class="menu-item  {{ request()->routeIs('logout') ? 'active open' : '' }}">
            <a href="{{ route('logout') }}" class="menu-link">
                <i class="menu-icon bx bx-power-off me-2"></i>
                <div data-i18n="Logout">Logout</div>
            </a>
        </li>
    
    </ul>
</aside>
