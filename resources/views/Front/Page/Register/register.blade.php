@extends('Front.Layouts.master')
@section('content')
    <div class="container lx">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-body">
                    <ul class="nav nav-tabs final-login">
                        <li class="active"><a data-toggle="tab" href="#sectionA">Sign In</a></li>
                        <li><a data-toggle="tab" href="#sectionB">Join us!</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="sectionA" class="tab-pane fade in active">
                            <div class="innter-form">
                                @include('Front.Includes.validation')
                                @if(session('error'))
                                    <div class="alert alert-danger">{{session('error')}} </div>
                                @endif
                                @if(session('success'))
                                    <div class="alert alert-success">{{session('success')}} </div>
                                @endif
                                <form class="sa-innate-form" action="{{route('user-login')}}" method="post">
                                   {{csrf_field()}}
                                    <label>Email Address</label>
                                    <input type="text" name="email">
                                    <label>Password</label>
                                    <input type="password" name="password">
                                    <button type="submit">Sign In</button>
                                    <a href="">Forgot Password?</a>
                                </form>
                            </div>
                            <div class="social-login">
                                <p>- - - - - - - - - - - - - Sign In With - - - - - - - - - - - - - </p>
                                <ul>
                                    <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
                                    <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
                                    <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="sectionB" class="tab-pane fade">
                            <div class="innter-form">
                                @include('Front.Includes.validation')
                                <form class="sa-innate-form" action="{{route('register')}}" method="post">
                                    {{csrf_field()}}
                                    <label>Full Name</label>
                                    <input type="text" name="name">
                                    <label>Email Address</label>
                                    <input type="text" name="email">
                                    <label>Password</label>
                                    <input type="password" name="password">
                                    <label>Adress line 1</label>
                                    <input type="text" name="add1">

                                    <button type="submit">Join now</button>
                                    <p>By clicking Join now, you agree to our Privacy Policy, and Cookie Policy.</p>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection