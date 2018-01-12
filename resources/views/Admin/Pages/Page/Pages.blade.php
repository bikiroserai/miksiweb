@extends('Admin.Layouts.master')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menu and pages</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add page or menu
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            @include('Admin.Includes.validation')

                            <form action="{{route('page')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-11 col-md-11">
                                        <div class="form-group">
                                            <input type="text" name="pageName" id="categoryName" class="form-control input-lg" placeholder="Page Name" tabindex="1">
                                        </div>
                                    </div>
                                </div>

                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-12 col-md-11">
                                        <input type="submit" class="btn btn-success btn-block btn-lg" class="" value="Published"></div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Page Items
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        {{--<th>Thumbnails</th>--}}
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($pages)>0)
                                        @forelse($pages as $key=>$page)
                                            <tbody>
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$page->name}}</td>

                                                <td>
                                                    <form action="{{route('page-status-update')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="_pid" value="{{$page->id}}">
                                                        @if($page->status==0)
                                                            <button class="btn btn-primary btn-sm" name="enable">Enable</button>
                                                        @else
                                                            <button class="btn btn-danger btn-sm" name="disable">Disable</button>
                                                        @endif
                                                    </form>
                                                </td>
                                                {{--<td><img src="{{URL::to('images/Thumbnails/'.$page->page_logo)}}" width="50" alt="Logo"></td>--}}
                                                <td>
                                                    <a class="btn btn-danger btn-sm" href="{{URL('admin/editor/delete-page')}}/{{$page->id}}">Delete</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        @empty
                                        @endforelse
                                    @else
                                        <tr>
                                            <td colspan="6">Data not found.</td>
                                        </tr>
                                        @endif
                                        </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>




            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection