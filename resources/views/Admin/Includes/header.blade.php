@section('header')

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title',$title)</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{URL::to('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{URL::to('css/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{URL::to('css/startmin.css')}}" rel="stylesheet">

        <!-- jQuery -->
        <script src="{{URL::to('js/jquery.min.js')}}"></script>

        <!-- Custom Fonts -->
        {{--<link href="{{URL::to('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">--}}


    </head>
    <body>

    <div id="wrapper">
@endsection