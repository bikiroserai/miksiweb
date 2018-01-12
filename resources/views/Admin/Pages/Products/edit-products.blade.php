@extends('Admin.Layouts.master')

@section('content')
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('change','#parent_cat_id', function () {
                var pid = $(this).val();
                var div = $(this).parents();
                var op = " ";

                $.ajax({
                    type:'get',
                    url:'{{route("selectCategory")}}',
                    data:{'pid':pid},
                    success:function (data) {

                        op+='<option value="0" selected disabled>Select Category</option>';
                        for(var i=0;i<data.length; i++){
                            op+='<option value="'+data[i].category_id+'">'+data[i].category_name+'</option>';
                        }
                        div.find('#category_id').html(" ");
                        div.find('#category_id').append(op);
                    }
                });
            });
        });

    </script>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit-Products</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('Admin.Includes.validation')
                <form action="{{URL::to('admin/edit-product')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @if(count($details)>0)
                        @forelse($details as $key=>$detail)
                        <input type="hidden" name="_pid" value="{{$detail->product_id}}">
                            <input type="hidden" name="_piid" value="{{$detail->id}}">
                        <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="col-sm-3 input-title">
                                <label for="name" class="control-label">Product Name</label>
                            </div>
                            <div class="col-sm-9 form-group">
                                <input type="text" name="name" id="name" class="form-control input-lg" value="{{$detail->product_name}}" tabindex="1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="col-sm-3 input-title">
                                <label for="discount" class="control-label">Parent Category</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select name="parent_cat_id" id="parent_cat_id" class="form-control input-lg" tabindex="2">

                                        <option value="{{$detail->name}}" disabled selected>{{$detail->name}}</option>
                                        @forelse($pages as $key=>$page)
                                            {{--@if($detail->name!=$page->name)--}}
                                                <option value="{{$page->id}}">{{$page->name}}</option>
                                            {{--@endif--}}
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="col-sm-3 input-title">
                                <label for="discount" class="control-label"> Sub-Category</label>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select name="category_id" id="category_id" class="form-control input-lg" tabindex="2">
                                        <option value="" selected>Select Category</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="col-sm-3 input-title">
                                <label for="backImage" class="control-label">Quantity</label>
                            </div>
                            <div class="col-sm-9 form-group">
                                <input type="number" name="quantity" value="{{$detail->quantity}}" class="form-control input-lg">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="col-sm-3 input-title">
                                <label for="price" class="control-label">Product Price</label>
                            </div>
                            <div class="col-sm-9 form-group">
                                <input type="number" name="price" value="{{$detail->product_price}}" class="form-control input-lg">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="col-sm-3 input-title">
                                <label for="discount" class="control-label">Product Size</label>
                            </div>
                            <div class="col-sm-9">
                                <select name="size" class="form-control input-lg">
                                    <option value="{{$detail->size}}" selected>{{$detail->size}}</option>
                                    @if($detail->size!='Small')
                                        <option value="Small">Small</option>
                                    @endif
                                    @if($detail->size!='Medium')
                                        <option value="Medium">Medium</option>
                                    @endif
                                    @if($detail->size!='Large')
                                        <option value="Large">Large</option>
                                    @endif
                                    @if($detail->size!='Extra Large')
                                        <option value="Extra Large">Extra Large</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="col-sm-3 input-title">
                                <label for="discount" class="control-label">Product Discount</label>
                            </div>
                            <div class="col-sm-9 form-group">
                                <input type="number" name="discount" value="{{$detail->product_discount}}" class="form-control input-lg">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <textarea name="details" id="details" class="form-control input-lg" cols="60" rows="10" placeholder="Enter Details of the product">{{$detail->product_details}}</textarea>
                            </div>
                        </div>
                    </div>


                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <input type="submit" class="btn btn-success btn-block btn-lg" value="Add Product"></div>
                    </div>
                    @empty
                    @endforelse
                    @endif
                </form>
            </div>
        </div>

        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection