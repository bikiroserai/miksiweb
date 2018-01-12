@extends('Front.Layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div id="sectionB" class="tab-pane"><br>
                   <h4> <strong>Give your full shipping information</strong></h4>
                    <div class="innter-form">
                        @include('Front.Includes.validation')
                        <form class="sa-innate-form" action="{{route('checkout')}}" method="post">
                            {{csrf_field()}}
                            <label>Full Name :</label>
                            <input type="text" name="full_name">
                            <label>City : </label>
                            <select name="city">
                                <option value="Kathmandu" selected>Kathmandu</option>
                                <option value="Bhaktapur">Bhaktapur</option>
                                <option value="Lalitpur">Lalitpur</option>
                            </select>
                            <label>Shipping Adsress :</label>
                            <input type="text" name="address">
                            <label>Phone No.:</label>
                            <input type="text" required  pattern="(0|[1-9][0-9]*)" name="phone">

                            @if(count($cartItems))
                                @forelse($cartItems as $key=>$cartItem)
                                    <input type="hidden" name="product_id" value="{{$cartItem->id}}">
                                    <input type="hidden" name="name" value="{{$cartItem->name}}">
                                    <input type="hidden" name="size" value="{{$cartItem->options->size}}">
                                    <input type="hidden" name="quantity" value="{{$cartItem->qty}}">
                                    <input type="hidden" name="price" value="{{$cartItem->price}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                @empty
                                    @endforelse
                            @endif
                            <div class="container">
                                <div class="row">
                                    <div class="paymentCont">
                                        <div class="headingWrap">
                                            <h3 class="headingTop text-center">Select Your Payment Method</h3>

                                        </div>
                                        <div class="paymentWrap">
                                            <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                                                <label class="btn paymentMethod active">
                                                    <div class="method visa"></div>
                                                    <input type="radio" name="options" checked>
                                                </label>
                                                <label class="btn paymentMethod">
                                                    <div class="method master-card"></div>
                                                    <input type="radio" name="options">
                                                </label>
                                                <label class="btn paymentMethod">
                                                    <div class="method amex"></div>
                                                    <input type="radio" name="options">
                                                </label>


                                            </div>
                                        </div>
                                        <div class="footerNavWrap clearfix">
                                           <a href="{{route('home')}}" class="btn btn-success">CONTINUE SHOPPING</a>
                                             <button class="btn btn-success pull-right">CHECKOUT</button>

                                    </div>

                                </div>
                            </div>
                            </div>
                            <p>By clicking order now, you agree to our Privacy Policy, and Cookie Policy.</p><br>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endsection