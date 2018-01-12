@extends('Admin.Layouts.master')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Images</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('Admin.Includes.validation')
                <form action="{{route('add-images')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <input type="hidden" name="_pid" value="{{$id}}">
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="col-sm-3 input-title">
                                <label for="frontImage" class="control-label">Images of Product</label>
                            </div>
                            <div class="col-sm-9 form-group">
                                <input type="file" name="image[]" class="form-control input-lg" multiple>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="col-sm-3 input-title">
                                <label for="discount" class="control-label">Product Discount</label>
                            </div>
                            <div class="col-sm-9 form-group">
                                <input type="number" name="discount" class="form-control input-lg">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <textarea name="details" id="details" class="form-control input-lg" cols="60" rows="10" placeholder="Enter Details of the product"></textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <input type="submit" class="btn btn-success btn-block btn-lg" class="" value="Add Product"></div>
                    </div>
                </form>
            </div>
        </div>

        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection