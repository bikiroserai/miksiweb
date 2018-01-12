@extends('Front.Layouts.master')
@section('content')
    <div class="new-arrivals-w3agile">
        <div class="container">

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        You Order Details
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Product's ID</th>
                                    <th>Product's Name</th>
                                    <th>Prices</th>
                                    <th>Quantities</th>
                                    <th>size</th>
                                    <th>City</th>
                                    <th>Shapping Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($orders)>0)
                                    @forelse($orders as $key=>$order)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$order->product_id}}</td>
                                            <td>{{$order->product_name}}</td>
                                            <td>{{$order->price}}</td>
                                            <td>{{$order->quantity}}</td>
                                            <td>{{$order->size}}</td>
                                            <td>{{$order->city}}</td>
                                            <td>{{$order->address}}</td>
                                            <td>
                                                <form action="{{route('order-status')}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_oid" value="{{$order->id}}">
                                                    @if($order->status!=0)
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

        </div>
    </div>
@endsection