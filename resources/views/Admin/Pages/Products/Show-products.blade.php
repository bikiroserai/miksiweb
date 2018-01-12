@extends('Admin.Layouts.master')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Show-Products</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>


        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Table
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Sizes</th>
                                <th>Prices</th>
                                <th>Quantities</th>
                                <th>Discounts</th>
                                <th>Thumbnails</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($allProducts)>0)
                            @forelse($allProducts as $key=>$product)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->size}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->product_discount}}</td>
                                @if(count($images)>0)
                                    @forelse($images as $key=>$image)
                                        @if($product->product_id==$image->product_id)
                                            <td><img src="{{URL::to('images/Thumbnails/'.$image->img_name)}}" width="50"></td>
                                        @break
                                        @endif
                                    @empty
                                        @endforelse
                                @endif
                                <td>
                                    <form action="{{route('product-status')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_prid" value="{{$product->id}}">
                                        @if($product->status==0)
                                            <button class="btn btn-primary btn-sm" name="enable">Enable</button>
                                        @else
                                            <button class="btn btn-danger btn-sm" name="disable">Delete</button>
                                        @endif
                                    </form>
                                </td>
                                <td><a class="btn btn-danger btn-sm" href="{{URL('admin/edit-product')}}/{{$product->id}}">Edit</a></td>
                            </tr>
                            </tbody>
                            @empty
                            @endforelse
                            @else
                                <tr>
                                    <td colspan="6">Data Not Found</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->



        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection