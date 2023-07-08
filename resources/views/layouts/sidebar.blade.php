<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ request()->route()->getName() == 'dashboard' ? 'active' : '' }}">
                    <a href="{{url('/')}}">
                        <i class="la la-dashboard"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ request()->route()->getName() == 'users' ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="la la-user"></i><span>Users</span>
                    </a>
                </li>
                <li class="menu-title">
                    <span>Human Resource</span>
                </li>
                <li class="{{ request()->route()->getName() == 'departments' ? 'active' : '' }}">
                    <a href="{{ route('departments.index') }}">
                        <i class="la la-dashboard"></i><span>Departments</span>
                    </a>
                </li>
                <li class="{{ request()->route()->getName() == 'positions' ? 'active' : '' }}">
                    <a href="{{ route('positions.index') }}">
                        <i class="la la-dashboard"></i><span>Department Positions</span>
                    </a>
                </li>
                <li class="{{ request()->route()->getName() == 'employees' ? 'active' : '' }}">
                    <a href="{{ route('employees.index') }}">
                        <i class="la la-dashboard"></i><span>Employees</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
