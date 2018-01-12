@extends('Admin.Layouts.master')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Orders</h1>
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
                                <th>Users</th>
                                <th>Product's ID</th>
                                <th>Product's Name</th>
                                <th>Prices</th>
                                <th>Quantities</th>
                                <th>size</th>
                                <th>City</th>
                                <th>Shapping Address</th>
                                <th>Phone</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($orders)>0)
                                @forelse($orders as $key=>$order)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$order->full_name}}</td>
                                        <td>{{$order->product_id}}</td>
                                        <td>{{$order->product_name}}</td>
                                        <td>{{$order->price}}</td>
                                        <td>{{$order->quantity}}</td>
                                        <td>{{$order->size}}</td>
                                        <td>{{$order->city}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>
                                            <form action="{{route('product-status')}}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_prid" value="{{$order->id}}">
                                                @if($order->status==0)
                                                    <button class="btn btn-primary btn-sm" name="enable">Enable</button>
                                                @else
                                                    <button class="btn btn-danger btn-sm" name="disable">Delete</button>
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