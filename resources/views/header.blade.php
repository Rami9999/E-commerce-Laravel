<?php
use App\Http\Controllers\ProductController;
$total=ProductController::getNemberOfCartItems();
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/">Home</a></li>
      <li class=""><a href="myorders">Order</a></li>
    </ul>
    <form class="navbar-form navbar-left" action="/search">
      <div class="form-group">
        <input type="text" name="query" class="form-control search-box" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
        @if(Session::has('user'))
        <li><a href="/cartItems">cart({{$total?$total:0}})</a></li>
        <li>
          <a href="/products">Products</a>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Session::get('user')['name']}}
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/logout">Logout</a></li>
            </ul>
          </li>
          @else
          <li><a href="/">Login</a></li>
          <li><a href="register">Register</a></li>
          @endif
    </ul>
    
  </div>
</nav>