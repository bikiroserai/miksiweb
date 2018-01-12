@extends('Front.Layouts.master')
@section('content')


    <div class="accessories-miksi">

        <div class="container">
            <h3 class="tittle">Get Your Deisgn T-shirt at Your Doorstep</h3>
            <span>TRENDING DESIGNS</span>

        </div>
    </div>


    <div class="new-arrivals-w3agile">
        <div class="container">
            <h2 class="tittle">Men</h2>
            <div class="arrivals-grids">
                @if(count($menProducts)>0)
                    @forelse($menProducts as $key=>$product)

                <div class="col-md-3 arrival-grid simpleCart_shelfItem">
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

                            <p ><em class="item_price">Rs. {{$product->product_price}}</em></p>
                            <a href="#" data-text="Add To Cart" class="btn btn-primary btn-lg">Add To wishlist</a>
                        </div>
                    </div>
                </div>
                    @empty
                    @endforelse
                @endif
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <div class="new-arrivals-w3agile">
        <div class="container">
            <h2 class="tittle">Women</h2>
            <div class="arrivals-grids">
                @if(count($womenProducts)>0)
                    @forelse($womenProducts as $key=>$product)

                        <div class="col-md-3 arrival-grid simpleCart_shelfItem">
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
                                    <p ><em class="item_price">Rs. {{$product->product_price}}</em></p>
                                    <a href="#" data-text="Add To Cart" class="btn btn-primary btn-lg">Add To wishlist</a>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                @endif
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

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