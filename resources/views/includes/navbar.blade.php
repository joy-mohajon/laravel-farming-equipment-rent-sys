<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="index3.html">Home</a>
        </li> --}}
        {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" title='search' role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" aria-label="Search"
                            placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" data-widget="navbar-search" type="button">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> --}}

        {{-- <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a class="dropdown-item" href="#">
                    <!-- Message Start -->
                    <div class="media">
                        <img class="img-size-50 img-circle mr-3" src="dist/img/user1-128x128.jpg" alt="User Avatar">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="text-danger float-right text-sm"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-muted text-sm"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <!-- Message Start -->
                    <div class="media">
                        <img class="img-size-50 img-circle mr-3" src="dist/img/user8-128x128.jpg" alt="User Avatar">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="text-muted float-right text-sm"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-muted text-sm"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <!-- Message Start -->
                    <div class="media">
                        <img class="img-size-50 img-circle mr-3" src="dist/img/user3-128x128.jpg" alt="User Avatar">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="text-warning float-right text-sm"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-muted text-sm"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item dropdown-footer" href="#">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <div class="image w-25">
                    <img style="width: 100%" class="img-circle" alt="User Image"
                        @if (auth()->user()->profile_image) src="{{ asset(auth()->user()->profile_image) }}"
                @else
                src="{{ asset('plugin/adminLte/img/avatar.png') }}" @endif>
                </div>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="text-muted float-right text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="text-muted float-right text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="text-muted float-right text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item dropdown-footer" href="#">See All Notifications</a>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" title='logout' role="button">
                <i class="fas fa-sign-out"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" title='full screen' role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
