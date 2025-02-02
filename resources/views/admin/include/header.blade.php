<header class="main-header">
    <a href="{{ route('home') }}" class="logo">
        <h4 class="text-custom">AMC Corporation</h4>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('admin_assets/admin_css/dist/img/avatar5.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ auth()->user()->name }}</span>

                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset('admin_assets/admin_css/dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
                            <p>{{ auth()->user()->name }} </p>
                            <p style="font-size: 14px;">Authentication Level: {{ auth()->user()->getRoleNames() }}</p>
                        </li>
                        <li class="user-body">
                            <div class="row">
                                <div class="text-center">
                                    <a class="topmenu" href="{{ route('change-password') }}">Change Password</a>
                                </div>
                            </div>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign Out </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
