@extends('master')
@section('content')

<div class="custom-product">
<h1>welcome {{Session::get('user')['name']}}</h1>
    <div class="col-sm-8">
    <div class="trending-wrapper">
        <h3>Your Orders</h3>
        <br><br>
        @foreach($orders as $order)
            <div class="row searched-item cart-list-devider">
                    <div class="col-sm-3">
                        <a href="detail/{{$order->product_id}}">
                            <img class="trending-image" src="{{$order->gallery}}" >
                        </a>
                    </div>
                    <div class="col-sm-4">
                            <div class="">
                                <h5>Name : {{$order->name}}</h2>
                                <h6>Order_ID : {{$order->id}}</h6>
                                <h6>description : {{$order->description}}</h6>
                                <h6>Delievry Status : {{$order->status}}</h6>
                                <h6>Address : {{$order->address}}</h6>
                                <h6>Payment Method : {{$order->Payment_Method}}</h6>
                                <h6>Payment Status : {{$order->Payment_Status}}</h6>
                            </div>
                    </div>
                    @if($order->Payment_Status==='pending')
                        <div class="col-sm-4" style="margin-top:20px">
                            <a href="/recieve/{{$order->id}}"><button class="btn btn-success">Recieve</button></a>
                        </div>
                    @else
                        <div class="col-sm-4" style="margin-top:20px">
                            <span style='font-size:50px;'>&#9989;</span>
                        </div>
                    
                    @endif
            </div>
        @endforeach
    </div>
    </div>
</div>
    
@endsection