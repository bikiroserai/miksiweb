@extends('Front.Layouts.master')
@section('content')
<style>
    h3{
        align-items: center!important;
        margin: 2%!important;
    }
</style>

	<h3>Cart Items</h3>
    <div class="container">
		<table class="table table-hover cart" border="1">
			<thread>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Size</th>
                    <th>Quantity</th>
                    <th>Price</th>
					<th>Action</th>
				</tr>
			</thread>
			<tbody>

				@foreach($CartItems as $key=>$cartItem)
				<tr>
					<td>{{$cartItem->id}}</td>
					<td>{{$cartItem->name}}</td>
					<td>{{$cartItem->options->size}}</td>
                    <td>{{$cartItem->qty}}</td>
                    <td>{{$cartItem->price}}</td>
					<td><a href="{{URL::to('/remove-cart')}}/{{$cartItem->rowId}}">Remove</a></td>

				</tr>
				@endforeach
                <tr>
                    <td colspan="3"></td>
                    <td >Excluding Tax: <br> Tax: <br> Total:</td>
                    <td>{{Cart::subtotal()}}<br><u>{{Cart::tax()}}</u><br>{{Cart::total()}}</td>
					<td>
						@if(!empty($cartItem))
					<a href="{{route('checkout')}}" class="btn btn-success">Check Out</a>
						@endif
					</td>
                </tr>
			</tbody>

		</table>

    </div>
@endsection