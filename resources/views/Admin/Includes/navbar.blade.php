@section('navbar')

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="admin">Miksi Admin</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="http://miksiweb.com"><i class="fa fa-home fa-fw"></i> Miksiweb.com</a></li>
        </ul>

        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="label label-pill label-danger count">@if(!empty($uCount) && !empty($oCount)){{$uCount+$oCount}} @endif</span>
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="{{route('admin')}}">
                            <div>
                                <i class="fa fa-user-circle-o fa-fw"></i>@if(!empty($uCount)){{$uCount}} @endif New User

                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('orders')}}">
                            <div>
                                <i class="fa fa-edit fa-fw"></i> @if(!empty($oCount)){{$oCount}} @endif New Order

                            </div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}} <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{route('admin-logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li>
                        <a href="{{route('admin')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Products<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('add-products')}}">Add Products</a>
                            </li>
                            <li>
                                <a href="{{route('show-products')}}">Show Products</a>
                            </li>
                            <li>
                                <a href="{{route('category')}}">Category</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{route('all-table')}}"><i class="fa fa-table fa-fw"></i> Tables</a>
                    </li>
                    <li>
                        <a href="{{route('page')}}"><i class="fa fa-book fa-fw"></i> Pages</a>
                    </li>
                    <li>
                        <a href="{{route('orders')}}"><i class="fa fa-edit fa-fw"></i> Orders  <span class="label label-pill label-danger count">@if(!empty($oCount)){{$oCount}} @endif</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('users')}}"><i class="fa fa-user-circle-o fa-fw"></i> Users  <span class="label label-pill label-danger count">@if(!empty($uCount)){{$uCount}} @endif</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>


@endsection