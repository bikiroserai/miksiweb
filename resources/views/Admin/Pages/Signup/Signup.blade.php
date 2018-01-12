<!DOCTYPE html>
<html>
<head>
    <title>Sign up for Admin</title>
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
        <div class="loginPannel col-md-8 col-lg-offset-2">


            <div class="panel panel-primary">
                <div class="panel-heading"><b>Sign up to the Dashboard</b></div>
                <div class="panel-body">
                @include('Admin.Includes.validation')

                <!-- Form Start -->


                    <div class="col-xs-12">
                        <form action="{{route('signup')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name : </label>
                                        <input type="text" name="name" id="name" class="form-control input-lg" placeholder="User Name" tabindex="1">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Email : </label>

                                        <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email" tabindex="2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="name">User Type : </label>
                                        <select name="utype" id="utype" class="form-control input-lg" tabindex="2">
                                            <option value="User">User</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Profile Picture : </label>
                                        <input type="file" name="image" id="image" class="form-control input-lg" placeholder="Profile Picture" tabindex="2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Password : </label>
                                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Re-type password : </label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                                    </div>
                                </div>
                            </div>


                            <hr class="colorgraph">
                            <div class="row">
                                <div class="pull-right">
                                    <input type="submit" class="btn btn-success btn-block btn-lg" class="" value="Sign Up"></div>
                            </div>
                        </form>
                    </div>

                    Already have an Account ? <a href="{{route('login')}}"> Sign In</a>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>