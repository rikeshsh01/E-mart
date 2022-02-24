<header class="topbar" data-navbarbg="skin5">


    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="dashboard.html">
                <!-- Logo icon -->
                <b class="">
                    <!-- Dark Logo icon -->
                    <img class="logo-text" src="{{ asset('frontend/assets/images/logoo.png') }}" alt="homepage" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->

            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav d-none d-md-block d-lg-none">
                <li class="nav-item">
                    <a class="nav-toggler nav-link waves-effect waves-light text-white" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav ml-auto d-flex align-items-center">

                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class=" in">
                    <form role="search" class="app-search d-none d-md-block mr-3">
                        <input type="text" placeholder="Search..." class="form-control mt-0">
                        <a href="" class="active">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li>
                    <a class="profile-pic" href="#">
                        @if (Auth::user()->photo)

                            <img src="{{ Auth::user()->photo }}" alt="user-img" width="36" height="36"
                                class="img-circle">
                        @else
                            <img src="{{ Helper::userDefaultImage() }}" width="36" alt="user-img" class="img-circle">
                        @endif
                        <span class="text-white font-medium">
                            {{ Auth::user()->full_name }}
                        </span>
                    </a>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->

                <!-- log out -->
                <li>

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}

                        <i class="icon-login"></i>

                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>
