@extends('master')
@section('content')
<h1>welcome {{Session::get('user')['name']}}</h1>
@endsection