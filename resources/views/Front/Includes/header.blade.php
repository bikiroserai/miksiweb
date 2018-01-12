@section('header')
        <!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title',$title)</title>
    <!--css-->
    <link href="{{URL::to('css/Front/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{URL::to('css/Front/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{URL::to('css/styles.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{URL::to('css/Front/font-awesome.css')}}" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!--css-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
   <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Salsa" />
    <link rel="stylesheet" href="{{URL::to('css/Front/flexslider.css')}}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{URL::to('css/Front/jstarbox.css')}}" type="text/css" media="screen" charset="utf-8" />
    <!--//End-rate-->
    <link href="{{URL::to('css/Front/owl.carousel.css')}}" rel="stylesheet">

</head>

<body>
<!--header-->
<div class="header-top">
    <div class="container">
        <div class="top-left">
            <a href="#">Hotline<i class="fa fa-phone" aria-hidden="true"></i>+977-9876764637</a>
        </div>
        <div class="top-right">
            <ul>
                <li><a href="{{route('cart-item')}}">Checkout</a></li>
                @if(Auth::User())
                    <li><a href="{{route('profile')}}">{{Auth::User()->name}}</a></li>
                    <li><a href="{{route('logout')}}">Logout</a></li>

                @else
                <li><a href="{{URL::to('register')}}">Login/Register</a></li>
                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="heder-bottom custom-nav">
    <div class="container  ">
        <div class="logo-nav" >
            <div class="logo-nav-left">
                <a href="{{URL::to('home')}}" ><img src="{{URL::to('Images/mainlogo1.png')}}"></a>
            </div>
            <div class="logo-nav-left1">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav">
                            <!-- Mega Menu -->
                            @if(count($pages)>0)
                                @forelse($pages as $key=>$page)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$page->name}}<b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">

                                    <div class="row">
                                        <div class="col-sm-3  multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <h6>Category</h6>
                                                @if(count($categories)>0)
                                                    @forelse($categories as $key=>$category)
                                                        @if($page->id==$category->parent_id)
                                                            <li><a href="{{URL::to('/category')}}/{{$category->category_id}}">{{$category->category_name}}</a></li>
                                                        @endif
                                                    @empty
                                                    @endforelse
                                                @endif
                                            </ul>
                                        </div>

                                        <div class="col-sm-3  multi-gd-img">
                                            <a href=""><img src="{{URL::to('Images/men.jpg')}}" alt=" "/></a>
                                        </div>
                                        <div class="col-sm-3  multi-gd-img">
                                            <a href=""><img src="{{URL::to('Images/men.jpg')}}" alt=" "/></a>
                                        </div>
                                        <div class="col-sm-3  multi-gd-img">
                                            <a href=""><img src="{{URL::to('Images/men.jpg')}}" alt=" "/></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </ul>
                            </li>
                                @empty
                                @endforelse
                            @endif

                            <li><a href="">View Designs</a></li>
                            <li><a href="{{URL::to('design')}}">Start Design</a></li>
                                <a href="{{route('cart-item')}}" style="position: relative; left:80% ">
                                    <i class="fa fa-shopping-cart fa-2x" aria-hidden="true">
                                    </i>
                                    Cart
                                    <span class="alert badge">
                                        {{Cart::count()}}
                                    </span>
                                </a>
                        </ul>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

@endsection