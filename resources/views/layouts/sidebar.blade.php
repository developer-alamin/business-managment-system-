<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link " href="{{ route('home') }}">
        <i class="bi bi-grid"></i>
         <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->
     <!-- Start Member Nav -->
     <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#attribute-nav" data-bs-toggle="collapse" href="#">
            <i class="fas fa-users"></i><span>Attribute</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="attribute-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
                <a href="{{ route('attribute.index') }}">
                    <i class="bi bi-circle"></i><span>All Attributes</span>
                </a>
            </li>
            <li>
                <a href="{{ route('attribute.create') }}">
                    <i class="bi bi-circle"></i><span>Add Attribute</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- End Member Nav -->
    <!-- Start Member Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#member-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-users"></i><span>Member</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="member-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
                <a href="{{ route('member.index') }}">
                    <i class="bi bi-circle"></i><span>All Members</span>
                </a>
            </li>
            <li>
                <a href="{{ route('member.create') }}">
                    <i class="bi bi-circle"></i><span>Add Member</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- End Member Nav -->
    <!-- Start Notice Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#notice-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-users"></i><span>Note</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="notice-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
                <a href="{{ route('note.index') }}">
                    <i class="bi bi-circle"></i><span>All Notes</span>
                </a>
            </li>
            <li>
                <a href="{{ route('note.create') }}">
                    <i class="bi bi-circle"></i><span>Add Notes</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- End Notice Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
             <i class="fab fa-product-hunt"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="product-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
                <a href="{{ route('product.index') }}">
                    <i class="bi bi-circle"></i><span>All Products</span>
                </a>
            </li>
            <li>
                <a href="{{ route('product.create') }}">
                    <i class="bi bi-circle"></i><span>Add Product</span>
                </a>
            </li>
        </ul>
    </li><!-- End Product Nav -->

     <!-- Start Investor Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#investor-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-user-md"></i><span>Investor</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="investor-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
                <a href="{{ route('investor.index') }}">
                    <i class="bi bi-circle"></i><span>All Investors</span>
                </a>
            </li>
            <li>
                <a href="{{ route('investor.create') }}">
                    <i class="bi bi-circle"></i><span>Add Investor</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- End Investor Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#invesCollect-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-user-secret"></i><span>Investment Collection</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="invesCollect-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
           <li>
                <a href="{{ route('collecttion.index') }}">
                    <i class="bi bi-circle"></i><span>All Collections</span>
                </a>
            </li>
            <li>
                <a href="{{ route('collecttion.create') }}">
                    <i class="bi bi-circle"></i><span>Add Collection</span>
                </a>
            </li>
        </ul>
    </li><!-- End Broker Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#investment-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-user"></i><span>Investment</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
        <ul id="investment-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('investment.index') }}">
                    <i class="bi bi-circle"></i><span>All Investments</span>
                </a>
            </li>
            <li>
                <a href="{{ route('investment.create') }}">
                    <i class="bi bi-circle"></i><span>Add Investment</span>
                </a>
            </li>
        </ul>
    </li><!-- End Investment Nav -->

    {{-- Start Doctor Nav --}}
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#doctor-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-user"></i><span>Doctors</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
        <ul id="doctor-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('doctor.index') }}">
                    <i class="bi bi-circle"></i><span>All Doctors</span>
                </a>
            </li>
            <li>
                <a href="{{ route('service.create') }}">
                    <i class="bi bi-circle"></i><span>Services</span>
                </a>
            </li>
            <li>
                <a href="{{ route('servicetype.create') }}">
                    <i class="bi bi-circle"></i><span>Service Category</span>
                </a>
            </li>
        </ul>
    </li>
    {{-- End Doctor Nav --}}
    
    {{-- Start Expense Nav --}}
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#expense-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-user"></i><span>Expenses</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
        <ul id="expense-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('expense.index') }}">
                    <i class="bi bi-circle"></i><span>All Expenses</span>
                </a>
            </li>
            <li>
                <a href="{{ route('expense.create') }}">
                    <i class="bi bi-circle"></i><span>Add Expense</span>
                </a>
            </li>
        </ul>
    </li>
    {{-- End Expense Nav --}}

    {{-- Start Income Nav --}}
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#income-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-user"></i><span>Incomes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
        <ul id="income-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('income.index') }}">
                    <i class="bi bi-circle"></i><span>All Incomes</span>
                </a>
            </li>
            <li>
                <a href="{{ route('income.create') }}">
                    <i class="bi bi-circle"></i><span>Add Income</span>
                </a>
            </li>
        </ul>
    </li>
    {{-- End Income Nav --}}

    {{-- Start Loan Nav --}}
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#loan-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-user"></i><span>Loan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
        <ul id="loan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('loan.index') }}">
                    <i class="bi bi-circle"></i><span>All Loan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('loan.create') }}">
                    <i class="bi bi-circle"></i><span>Add Loan</span>
                </a>
            </li>
        </ul>
    </li>
    {{-- End Loan Nav --}}
    

    {{-- Start Payment Methods Nav --}}
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#payment_method-nav" data-bs-toggle="collapse" href="#">
             <i class="fas fa-user"></i><span>Payments Method</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
        <ul id="payment_method-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('method.index') }}">
                    <i class="bi bi-circle"></i><span>All Method</span>
                </a>
            </li>
            <li>
                <a href="{{ route('method.create') }}">
                    <i class="bi bi-circle"></i><span>Add Method</span>
                </a>
            </li>
        </ul>
    </li>
    {{-- End Payment Methods Nav --}}

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
                    <i class="bi bi-circle"></i><span>All Roles</span>
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
                    <i class="bi bi-circle"></i><span>All Permission</span>
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
                    <i class="bi bi-circle"></i><span>All Users</span>
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
