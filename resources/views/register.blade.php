@extends('master')
@section('content')
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
    <form action="/register" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" placeholder="Enter name">
            
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label >You already have account?  <a href="/">Log in</a></label>
            
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

</div>
    <div class="col-sm-4"></div>
    </div>

</div>

@endsection