<!DOCTYPE html>
<html>
<head>
    <title>Admin :: Login</title>
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.min.css')}} ">

    <style>

        .loginPannel{
            margin-top: 100px;
        }

    </style>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="loginPannel col-md-6 col-lg-offset-3">


            <div class="panel panel-primary">
                <div class="panel-heading">Login to the Dashboard</div>
                <div class="panel-body">

                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-primary">{{session('success')}}</div>
                    @endif

                    <form action="{{route('login')}}" method="post">

                        {{csrf_field()}}

                        <div class="form-group input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="email" placeholder="Email" aria-describedby="sizing-addon2">
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="sizing-addon2">
                        </div>

                        <div class="form-group input-group">
                            <input type="checkbox" name="remember">
                            <label for="remember">Remember Me</label>
                        </div>

                        <div class="form-group input-group pull-right">
                            <button class="btn btn-success" name="remember">
                                Log In
                            </button>
                        </div>

                    </form>
                    Don't have an Account ? <a href="{{route('signup')}}"> Sign Up</a>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>