@extends('master')
@section('content')
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
    <form action="/login" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label >You don't have account?  <a href="register">Sign up</a></label>
            
        </div>
        <button type="submit" class="btn btn-primary">login</button>
    </form>

</div>
    <div class="col-sm-4"></div>
    </div>

</div>

@endsection