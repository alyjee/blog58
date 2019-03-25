<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
    <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
    </span> </div>
                <!-- /input-group -->
            </li>
            <li class="user-pro">
                <a href="javascript://" class="waves-effect">
                    <img src="{{ asset( Auth::guard()->user()->image ) }}" alt="user-img" class="img-circle">
                    <span class="hide-menu"> {{ Auth::guard()->user()->name }}
                    </span>
                </a>
                
            </li>

            <li>
                <a href="{{ route('dashboard.index') }}" class="waves-effect active">
                    <i class="zmdi zmdi-view-dashboard zmdi-hc-fw fa-fw" ></i>
                    <span class="hide-menu"> Dashboard</span>
                </a>
            </li>

            <li>
                <a href="javascript://" class="waves-effect">
                    <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw"></i>
                    <span class="hide-menu">Hotels <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('dashboard.hotels.index') }}">View All</a></li>
                    <li><a href="{{ route('dashboard.hotels.create') }}">Add New</a></li>
                </ul>
            </li>
            

            <li>
                <a href="javascript://" class="waves-effect">
                    <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw"></i>
                    <span class="hide-menu">Umrah Forms <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('dashboard.umrah.index') }}">View Proposals</a></li>
                    <li><a href="{{ route('dashboard.umrah.create') }}">Add New</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('logout') }}" class="waves-effect" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="zmdi zmdi-power zmdi-hc-fw fa-fw"></i>
                    <span class="hide-menu">Log out</span>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }} </form>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- Left navbar-header end