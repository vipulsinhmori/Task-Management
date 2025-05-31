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
    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('dashboard/index') ? 'active open' : '' }}">
            <a href="{{ route('dashboard/index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate">Dashboards</div>
            </a>
        </li>

       
        <li class="menu-item 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon eos-icons--admin"></i>
                <div class="text-truncate" data-i18n="Layouts">Admin</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('user.index') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" class="menu-link">
                        <div class="text-truncate">User</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('project.index') ? 'active' : '' }}">
                    <a href="{{ route('project.index') }}" class="menu-link">
                        <div class="text-truncate">Project <span class="mx-5 text-end">(  {{ \App\Models\Project::all()->count() }}  )</span></div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('task.index') ? 'active' : '' }}">
                    <a href="{{ route('task.index') }}" class="menu-link">
                        <div class="text-truncate">Task  <span class="mx-5 text-end">(  {{ \App\Models\Task::all()->count() }}  )</span></div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('project-status.index') ? 'active' : '' }}">
                    <a href="{{ route('project-status.index') }}" class="menu-link">
                        <div class="text-truncate">Add Project Status</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('task-status.index') ? 'active' : '' }}">
                    <a href="{{ route('task-status.index') }}" class="menu-link">
                        <div class="text-truncate">Add Task Status</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->routeIs('user.index') ? 'active open' : '' }}">
            <a href="{{ route('user.index') }}" class="menu-link">
                <i class="menu-icon fa-regular fa-user"></i>
                <div class="text-truncate">User</div>
            </a>
        </li>
      <li class="menu-item {{ request()->routeIs('project.index') ? 'active open' : '' }}">
    <a href="{{ route('project.index') }}" class="menu-link">
        <i class="menu-icon fa-solid fa-list-check"></i>
        <div class="text-truncate">Project </div>
    </a>
</li>

        <li class="menu-item {{ request()->routeIs('task.index') ? 'active open' : '' }}">
            <a href="{{ route('task.index') }}" class="menu-link">
               <i class="menu-icon fa-solid fa-clipboard-check"></i>
                <div class="text-truncate">Task</div>
            </a>
        </li>
        
    </ul>
</aside>
