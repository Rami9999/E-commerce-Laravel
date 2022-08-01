@extends('master')
@section('content')

<div class="custom-product">
<h1>welcome {{Session::get('user')['name']}}</h1>
    <div class="col-sm-8">
    <div class="trending-wrapper">
        <h3>Items in your Cart</h3>
        <br><br>
        @if(count($products)==0)
        <h3>nothing in your Cart</h3>
        @else
        <a  href="ordernow"><button class="btn btn-success">Order Now</button></a>
        @endif
        @foreach($products as $product)
            <div class="row searched-item cart-list-devider">
                    <div class="col-sm-3">
                        <a href="detail/{{$product->id}}">
                            <img class="trending-image" src="{{$product->gallery}}" >
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="detail/{{$product->id}}">
                            <div class="">
                                <h3>{{$product->name}}</h2>
                                <h5>{{$product->description}}</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3 warning-button">
                    <a href="/removeCart/{{$product->cart_id}}"><button class="btn btn-warning" >Remove from Cart</button></a>
                    </div>
            </div>
        @endforeach
    </div>
    </div>
</div>
    
@endsection