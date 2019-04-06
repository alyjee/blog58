<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <div class="top-left-part">
            <a class="logo" href="{{ route('dashboard.index') }}">
                <b>
                    <img src="{{ asset('public/images/sealinks-logo.jpg') }}" alt="home" style="max-width: 100px;" />
                </b>
                <span class="hidden-xs hide">
                    <img src="{{ asset('public/images/sealinks-logo.jpg') }}" alt="home" />
                </span>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{ asset(Auth::guard()->user()->image) }}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::guard()->user()->name }}</b> </a>
                <ul class="dropdown-menu dropdown-user scale-up">
                    <!-- <li><a href="#"><i class="ti-user"></i> My Profile</a></li> -->
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> Logout
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }} </form>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            
            <!-- .Megamenu -->
            {{-- @include('eadmin.partials.mega-menu') --}}
            <!-- /.Megamenu -->
            
            <!-- /.dropdown -->
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>