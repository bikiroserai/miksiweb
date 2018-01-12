@extends('Front.Layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

                <div id="sectionB" class="tab-pane">
                    <div class="innter-form">
                        @include('Front.Includes.validation')
                        <form class="sa-innate-form" action="{{route('checkout')}}" method="post">
                        <h1>Your order was  successful !</h1>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">

            </div>
        </div>
    </div>
@endsection