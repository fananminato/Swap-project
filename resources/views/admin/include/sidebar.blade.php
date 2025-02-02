<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header text-center"> CONTROL PANEL</li>


            <li class="treeview {{ request()->is('home*') ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <i class="fa fa-home text-custom"></i>
                    <span>Home</span>
                </a>
            </li>
            @if(auth()->user()->hasrole('admin') || auth()->user()->hasrole('researcher'))
            <li class="treeview {{ request()->is('users*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-home text-custom"></i>
                    <span>Users</span>
                </a>
            </li>
            @endif

            <li class="treeview {{ request()->is('projects*') ? 'active' : '' }}">
                <a href="{{ route('projects.index') }}">
                    <i class="fa fa-home text-custom"></i>
                    <span>Project</span>
                </a>
            </li>

            @if(auth()->user()->hasrole('admin') || auth()->user()->hasrole('assistant'))
            <li class="treeview {{ request()->is('equipments*') ? 'active' : '' }}">
                <a href="{{ route('equipments.index') }}">
                    <i class="fa fa-home text-custom"></i>
                    <span>Equipment</span>
                </a>
            </li>
            @endif


        </ul>
    </section>
</aside>
