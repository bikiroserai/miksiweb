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
                    <h1 class="page-header">Add-Products</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('Admin.Includes.validation')
                <form action="{{route('add-products')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="col-sm-3 input-title">
                                <label for="name" class="control-label">Product Name</label>
                            </div>
                            <div class="col-sm-9 form-group">
                                <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Product Name" tabindex="1">
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
                                        <option value="" disabled selected>Select Parent Category</option>
                                        @forelse($parentCategories as $key=>$category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
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
                                        <option value="" disabled selected>Select Category</option>
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
                                <input type="number" name="quantity" class="form-control input-lg">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="col-sm-3 input-title">
                                <label for="price" class="control-label">Product Price</label>
                            </div>
                            <div class="col-sm-9 form-group">
                                <input type="number" name="price" class="form-control input-lg">
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
                                    <option disabled selected>Select Size of Product</option>
                                    <option value="Small">Small</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Large">Large</option>
                                    <option value="Extra Large">Extra Large</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>


                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <input type="submit" class="btn btn-success btn-block btn-lg pull-right" class="" value="Add Product"></div>
                    </div>
                </form>
            </div>
        </div>

        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection