@extends('Admin.Layouts.master')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New User Table
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>

                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($users)>0)
                                @forelse($users as $key=>$user)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$user->name}} @if($user->notification==1)<span class="label-danger"><i>New</i></span> @endif</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>
                                            <form action="{{route('user-status')}}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_uid" value="{{$user->id}}">
                                                @if($user->status==0)
                                                    <button class="btn btn-primary btn-sm" name="enable">Enable</button>
                                                @else
                                                    <button class="btn btn-danger btn-sm" name="disable">Disable</button>
                                                @endif
                                            </form>
                                        </td>
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