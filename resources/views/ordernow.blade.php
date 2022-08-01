@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-8">
        <table class="table">
        <tbody>
            <tr>
            <td>Price:</td>
            <td>{{$total}} $</td>
            </tr>
            <tr>
            <td>Tax:</td>
            <td>0 $</td>
            </tr>
            <tr>
            <td>Delievry:</td>
            <td>{{$total * 0.05}}</td>
            </tr>
            <tr>
            <td>Total Result</td>
            <td>{{$total * 1.05}}</td>
            </tr>
        </tbody>
        </table>
        <div class="col-sm-8">
            <form method="POST" action="/orderplace">
            @csrf
                <div class="form-group">
                    <textarea name="address"  placeholder="Enter Your address"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Payment Method</label><br><br>
                    <input type="radio" name="Payment_Method" value="Paypal"><span>Paypal</span><br>
                    <input type="radio" name="Payment_Method" value="MasterCard"><span>MasterCard</span><br>
                    <input type="radio" name="Payment_Method" value="VisaCard"><span>VisaCard</span><br>
                </div>
                <button type="submit" class="btn btn-primary">Order Now</button>
            </form>
        </div>
    </div>
</div>
    
@endsection