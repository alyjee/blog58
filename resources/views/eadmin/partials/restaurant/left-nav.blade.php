Left navbar-header -->
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
                    <img src="{{ asset( Auth::user()->image ) }}" alt="user-img" class="img-circle">
                    <span class="hide-menu"> {{ Auth::user()->name }}
                        <span class="fa arrow"></span>
                    </span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('r_dashboard.profile') }}"><i class="ti-user"></i> My Profile</a></li>
                    {{-- <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li> --}}
                    <li><a href="{{ route('r_dashboard.acc.index') }}"><i class="ti-settings"></i> Account Setting</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i>Log out
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }} </form>
                        </a>
                    </li>
                    {{-- <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li> --}}
                </ul>
            </li>

            <li>
                <a href="{{ route('r_dashboard.index') }}" class="waves-effect active">
                    <i class="zmdi zmdi-view-dashboard zmdi-hc-fw fa-fw" ></i>
                    <span class="hide-menu"> Dashboard</span>
                </a>
            </li>

            <li>
                <a href="javascript://" class="waves-effect">
                    <i class="zmdi zmdi-copy zmdi-hc-fw fa-fw"></i>
                    <span class="hide-menu">Restaurant Details<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('r_dashboard.food_categories') }}">Food Categories</a></li>
                    @if(Auth::user()->restaurant()->first()->partner_category()->first()->multi_location)
                        <li><a href="{{ route('r_dashboard.addresses') }}">Addresses</a></li>
                    @else
                        <li><a href="{{ route('r_dashboard.address') }}">Address</a></li>
                    @endif
                    <li><a href="{{ route('r_dashboard.images') }}">Images</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript://" class="waves-effect">
                    <i class="zmdi zmdi-copy zmdi-hc-fw fa-fw"></i>
                    <span class="hide-menu">Menu Categories <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('r_dashboard.menu_cat.index') }}">View All</a></li>
                    <li><a href="{{ route('r_dashboard.menu_cat.create') }}">Add New</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript://" class="waves-effect">
                    <i class="zmdi zmdi-copy zmdi-hc-fw fa-fw"></i>
                    <span class="hide-menu">Menu Variations <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('r_dashboard.variations.index') }}">View All</a></li>
                    <li><a href="{{ route('r_dashboard.variations.create') }}">Add New</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript://" class="waves-effect">
                    <i class="zmdi zmdi-copy zmdi-hc-fw fa-fw"></i>
                    <span class="hide-menu">Menu Items <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('r_dashboard.menu.index') }}">View All</a></li>
                    <li><a href="{{ route('r_dashboard.menu.create') }}">Add New</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript://" class="waves-effect">
                    <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw"></i>
                    <span class="hide-menu">Orders <span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('r_dashboard.orders.index') }}">View History</a></li>
                    {{-- <li><a href="javascript://">Add New</a></li> --}}
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