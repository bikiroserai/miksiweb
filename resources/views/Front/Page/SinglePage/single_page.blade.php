@extends('Front.Layouts.master')
@section('content')
    <script src="{{URL::to('js/Front/jquery.min.js')}}"></script>

    <!--content-->
    <div class="content">
        <!--single-->
        <div class="single-wl3">
            <div class="container">
                <div class="single-grids">
                    @if(count($products)>0)
                        @forelse($products as $key=>$product)
                            <input type="hidden" id="product_id" value="{{$product->product_id}}"/>
                            <div class="col-md-8 single-grid">
                                <div clas="single-top">
                                    <div class="single-left">
                                        <div class="flexslider">
                                            <ul class="slides">
                                                @if(count($images)>0)
                                                    @forelse($images as $key=>$image)
                                                        @if($image->product_id==$product->product_id)
                                                            <input type="hidden" id="image" value="{{$image->img_name}}">
                                                            <li data-thumb="{{URL::to('Images/Thumbnails/'.$image->img_name)}}">
                                                                <div class="thumb-image"> <img src="{{URL::to('Images/Thumbnails/'.$image->img_name)}}" data-imagezoom="true" class="img-responsive"> </div>
                                                            </li>
                                                        @endif
                                                    @empty
                                                    @endforelse
                                                @endif

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="single-right simpleCart_shelfItem">
                                        <input type="hidden" name="product_name" id="name" value="{{$product->product_name}}">
                                        <h4>{{$product->product_name}}</h4>
                                        {{--<div class="block">--}}
                                            {{--<div class="starbox small ghosting"> </div>--}}
                                        {{--</div>--}}

                                       <p class="price item_price"> Rs.{{$product->product_price}}</p>
                                        <input type="hidden" value="{{$product->product_price}}" id="price">
                                        <div class="description">
                                            <p><span>Quick Overview : </span>{{$product->product_details}}</p>
                                        </div>

                                        <div class="color-quality">
                                            <select name="size" id="size">
                                                <option disabled selected>Select Size</option>
                                                @if(count($extras)>0)
                                                    @forelse($extras as $e=>$extra)
                                                        <option value="{{$extra->quantity}},{{$extra->size}}" >{{$extra->size}}</option>

                                                    @empty
                                                    @endforelse
                                                @endif
                                            </select>
                                            @if(count($extras)>0)
                                                @forelse($extras as $e=>$extra)
                                                    <input type="hidden" value="{{$extra->id}}" id="pinfos_id">

                                                @empty
                                                @endforelse
                                            @endif
                                            <h6>Quantity :</h6>

                                            <div class="quantity">
                                                <div class="quantity-select">
                                                    <div class="entry value-minus1">&nbsp;</div>
                                                    <div class="entry value1" id="quantity"><span>1</span></div>
                                                    <div class="entry value-plus1 active">&nbsp;</div>
                                                </div>
                                            </div>
                                            <!--quantity-->
                                            <script>
                                                var quantitySize;
                                                var selectVal;
                                                $(document).ready(function () {
                                                    $(document).on('change','#size',function () {
                                                        var max = $('#size').val();
                                                        quantitySize = max.split(',');

                                                    });
                                                });
                                                $('.value-plus1').on('click', function(){
                                                    var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
                                                    selectVal=newVal; if (newVal<=quantitySize[0]) divUpd.text(newVal);
                                                });

                                                $('.value-minus1').on('click', function(){
                                                    var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
                                                    selectVal=newVal; if(newVal>=1) divUpd.text(newVal);
                                                });
                                                $(document).ready(function () {
                                                    $(document).on('click','#addtocart',function () {
                                                        var product_id = $('#product_id').val();
                                                        var name = $('#name').val();
                                                        var image = $('#image').val();
                                                        var size = quantitySize[1]
                                                        var price = $('#price').val();
                                                        var pinfo_id = $('#pinfos_id').val();

                                                        $.ajax({
                                                            type:'get',
                                                            url:"{{route('cart')}}",
                                                            data:{
                                                                'product_id':product_id,
                                                                'name':name,
                                                                'qty':selectVal,
                                                                'price':price,

                                                                'size':size,

                                                            },
                                                            success:function (data) {

                                                            }
                                                        });
                                                    });

                                                });
                                            </script>
                                            <!--quantity-->
                                        </div>

                                        <div class="women">
                                            <a href="" data-text="Add To Cart" id="addtocart" class="my-cart-b item_add">Add To Cart</a>
                                        </div>

                                        {{--<div class="social-icon">--}}
                                            {{--<a href="#"><i class="fa fa-facebook"></i></a>--}}
                                            {{--<a href="#"><i class="icon1"></i></a>--}}
                                            {{--<a href="#"><i class="icon2"></i></a>--}}
                                            {{--<a href="#"><i class="icon3"></i></a>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    @endif

                    <div class="col-md-4 single-grid1">
                        <h3>Recent Products</h3>
                        @if(count($recentProducts)>0)
                            @forelse($recentProducts as $key=>$product)
                                <div class="recent-grids">
                                    <div class="recent-left">
                                        @if(count($images)>0)
                                            @forelse($images as $key=>$image)
                                                @if($image->product_id==$product->product_id)
                                                    <a href="{{URL::to('single')}}/{{$product->product_id}}"><img class="img-responsive " src="{{URL::to('Images/Thumbnails/'.$image->img_name)}}" alt=""></a>
                                                    @break
                                                @endif
                                            @empty
                                            @endforelse
                                        @endif
                                    </div>
                                    <div class="recent-right">
                                        <h6 class="best2"><a href="{{URL::to('single')}}/{{$product->product_id}}">{{$product->product_name}} </a></h6>
                                        <div class="block">
                                            {{--<div class="starbox small ghosting"> </div>--}}
                                        </div>
                                        <span class=" price-in1">Rs. {{$product->product_price}}</span>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            @empty
                            @endforelse
                        @endif
                    </div>
                    <div class="clearfix"> </div>
                </div>

            </div>
            <!--single-->
            <div class="product-agile">
                <div class="container">
                    <h3 class="tittle1"> Best Sellers</h3>
                    <div class="slider">
                        <div class="callbacks_container">
                            <ul class="rslides" id="slider">
                                <li>
                                    <div class="caption">
                                        @if(count($bestSeller)>0)
                                            @forelse($bestSeller as $key=>$product)
                                                <div class="col-md-3 cap-left simpleCart_shelfItem">
                                                    <div class="grid-arr">
                                                        <div  class="grid-arrival">
                                                            <figure>
                                                                <a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
                                                                    @if(count($images)>0)
                                                                        @forelse($images as $key=>$image)
                                                                            <div class="grid-img">
                                                                                @if($product->product_id==$image->product_id)
                                                                                    <img src="{{URL::to('images/Thumbnails/'.$image->img_name)}}" class="img-responsive" alt="">
                                                                                    @if(++$key>2)
                                                                                        @break
                                                                                    @endif
                                                                                @endif
                                                                            </div>
                                                                        @empty
                                                                        @endforelse
                                                                    @endif
                                                                </a>
                                                            </figure>
                                                        </div>
                                                        <div class="block">
                                                            <div class="starbox small ghosting"> </div>
                                                        </div>
                                                        <div class="women">
                                                            <h6><a href="{{URL::to('single')}}/{{$product->product_id}}">{{$product->product_name}}</a></h6>
                                                            <span class="size">
                                                                @if(count($infos)>0)
                                                                    @forelse($infos as $i=>$info)
                                                                        @if($product->product_id==$info->product_id) | {{$info->size}} | @endif
                                                                    @empty
                                                                    @endforelse
                                                                @endif
                                                             </span>
                                                            <p ><em class="item_price">RS. {{$product->product_price}}</em></p>
                                                            <a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                            @endforelse
                                        @endif
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Products-->
@endsection