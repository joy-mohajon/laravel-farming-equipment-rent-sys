<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link" href="{{ route('dashboard') }}">
        <img class="brand-image img-circle elevation-3" src="{{ asset('plugin/adminLte/img/AdminLTELogo.png') }}"
            alt="AdminLTE Logo" style="opacity: .8">
        <span class="brand-text font-weight-light">AgreRent</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel d-flex mb-3 mt-3 pb-3">
            <div class="image">
                <img class="img-circle elevation-2" alt="User Image"
                    @if (auth()->user()->profile_image) src="{{ asset(auth()->user()->profile_image) }}"
                @else
                src="{{ asset('plugin/adminLte/img/avatar.png') }}" @endif>
            </div>
            <div class="info">
                <a class="d-block" href="{{ route('get.profile') }}">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" data-accordion="false"
                role="menu">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a class="nav-link active" href="{{ route('dashboard') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    @can('post_list')
                        <a class="nav-link" href="#">
                            {{-- <i class="nav-icon fas fa-files"></i> --}}
                            <i class="nav-icon fab fa-blogger"></i>
                            <p>Post
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('posts.index') }}">
                                    <i class="nav-icon fas fa-angle-double-right"></i>
                                    <p>My posts</p>
                                </a>
                            </li>
                        </ul>
                    @endcan
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link active" href="{{ route('rents.index') }}">
                        <i class="nav-icon fa-regular fa-file-lines"></i>
                        <p>
                            Pending confirmation
                            <i class="right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    @if (Auth::user()->hasRole('admin'))
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Manage user</p>
                        </a>
                    @endif
                </li>
                {{-- <li class="nav-item has-treeview">
                    @if (Auth::user()->hasRole('admin'))
                        <a class="nav-link" href="#">
                            <i class="nav-icon fas fa-users"></i>

                            <p>Admin
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">
                                    <i class="nav-icon fas fa-angle-double-right"></i>
                                    <p>User manager</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('roles.index') }}">
                                    <i class="nav-icon fas fa-angle-double-right"></i>
                                    <p>Roles manager</p>
                                </a>
                            </li>
                        </ul>
                    @endif --}}
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{ route('recognize-face') }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Attendance
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a> --}}
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
