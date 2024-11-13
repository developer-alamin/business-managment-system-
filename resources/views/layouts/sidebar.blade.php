<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link " href="{{ route('home') }}">
        <i class="bi bi-grid"></i>
         <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#member-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-users"></i><span>Member</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="member-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
                <a href="{{ route('roles.index') }}">
                    <i class="bi bi-circle"></i><span>View Member</span>
                </a>
            </li>
            <li>
                <a href="{{ route('roles.create') }}">
                    <i class="bi bi-circle"></i><span>Add Member</span>
                </a>
            </li>
        </ul>
    </li><!-- End Member Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
             <i class="fab fa-product-hunt"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="product-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
                <a href="{{ route('roles.index') }}">
                    <i class="bi bi-circle"></i><span>Add Product</span>
                </a>
            </li>
            <li>
                <a href="{{ route('roles.create') }}">
                    <i class="bi bi-circle"></i><span>All Product</span>
                </a>
            </li>
            <li>
                <a href="{{ route('roles.create') }}">
                    <i class="bi bi-circle"></i><span>Categories</span>
                </a>
            </li>
        </ul>
    </li><!-- End Product Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#doctors-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-user-md"></i><span>Doctors</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="doctors-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
                <a href="{{ route('roles.index') }}">
                    <i class="bi bi-circle"></i><span>View Doctors</span>
                </a>
            </li>
            <li>
                <a href="{{ route('roles.create') }}">
                    <i class="bi bi-circle"></i><span>Add Doctors</span>
                </a>
            </li>
        </ul>
    </li><!-- End Doctors Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#broker-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-user-secret"></i><span>Broker</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="broker-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
                <a href="{{ route('roles.index') }}">
                    <i class="bi bi-circle"></i><span>View Broker</span>
                </a>
            </li>
            <li>
                <a href="{{ route('roles.create') }}">
                    <i class="bi bi-circle"></i><span>Add Broker</span>
                </a>
            </li>
        </ul>
    </li><!-- End Broker Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#accounts-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-user"></i><span>Accounts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
        <ul id="accounts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#investment-nav" data-bs-toggle="collapse" href="#">
                     <i class="fas fa-landmark"></i><span>Investment</span><i class="bi bi-chevron-down fs-16 ms-auto"></i>
                    </a>
                <ul id="investment-nav" class="nav-content collapse " data-bs-parent="#accounts-nav">
                    <li>
                        <a href="{{ route('roles.index') }}">
                            <i class="bi bi-circle"></i><span>Add Investment</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('roles.index') }}">
                            <i class="bi bi-circle"></i><span>All Investments</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('roles.index') }}">
                            <i class="bi bi-circle"></i><span>Investor</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Investment Nav -->
            <li>
                <a href="{{ route('roles.index') }}">
                    <i class="bi bi-circle"></i><span>Others Income</span>
                </a>
            </li>
            <li>
                <a href="{{ route('roles.create') }}">
                    <i class="bi bi-circle"></i><span>Others Expense</span>
                </a>
            </li>
        </ul>
    </li><!-- End Accounts Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#reports-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-file"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="reports-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
                <a href="{{ route('roles.index') }}">
                    <i class="bi bi-circle"></i><span>Product add to member</span>
                </a>
            </li>
            <li>
                <a href="{{ route('roles.create') }}">
                    <i class="bi bi-circle"></i><span>Investment</span>
                </a>
            </li>
        </ul>
    </li><!-- End Reports Nav -->



    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-cog"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="settings-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#account-settings-nav" data-bs-toggle="collapse" href="#">
                     <i class="bi bi-menu-button-wide"></i><span>Account settings</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                <ul id="account-settings-nav" class="nav-content collapse " data-bs-parent="#settings-nav">
                    <li>
                        <a href="{{ route('roles.index') }}">
                            <i class="bi bi-circle"></i><span>Income head</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('roles.index') }}">
                            <i class="bi bi-circle"></i><span>Expense head</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Account settings Nav -->

        </ul>
    </li><!-- End settings Nav -->

    @canany(['role create', 'role list', 'role edit','role delete'])
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#roles-nav" data-bs-toggle="collapse" href="#">
             <i class="fab fa-critical-role"></i><span>Role</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="roles-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           @can('role list')
           <li>
                <a href="{{ route('roles.index') }}">
                    <i class="bi bi-circle"></i><span>View Roles</span>
                </a>
            </li>
           @endcan
            @can('role create')
            <li>
                <a href="{{ route('roles.create') }}">
                    <i class="bi bi-circle"></i><span>Add Roles</span>
                </a>
            </li>
            @endcan

        </ul>
    </li><!-- End Roles Nav -->
    @endcanany

    @canany(['permission create', 'permission list', 'permission edit','permission delete'])
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#permission-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-lock"></i><span>Permissions</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="permission-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

            <li>
                <a href="{{ route('permission.index') }}">
                    <i class="bi bi-circle"></i><span>View Permission</span>
                </a>
            </li>

            @can('permission create')
            <li>
                <a href="{{ route('permission.create') }}">
                    <i class="bi bi-circle"></i><span>Add Permission</span>
                </a>
            </li>
            @endcan

        </ul>
    </li><!-- End Permissions Nav -->
    @endcanany

    {{-- @canany(['users create', 'users list', 'users edit','users delete']) --}}
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-users"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           {{-- @can('users list') --}}
            <li>
                <a href="{{ route('users.index') }}">
                    <i class="bi bi-circle"></i><span>View Users</span>
                </a>
            </li>
           {{-- @endcan
           @can('users create') --}}
            <li>
                <a href="{{ route('users.create') }}">
                    <i class="bi bi-circle"></i><span>Add Users</span>
                </a>
            </li>
           {{-- @endcan --}}

        </ul>
    </li><!-- End Users Nav -->
    {{-- @endcanany --}}
    </ul>

</aside><!-- End Sidebar-->
