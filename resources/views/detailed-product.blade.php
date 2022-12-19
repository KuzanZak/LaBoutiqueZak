@extends('homepage')
@section('pageJs', $pageJs)
@section('content')
<h1>{{$name}}</h1>
<div class="page-product-description">
    <div class="rating-product">Note : ??/5</div>
    <div>{{$stock > 0 ? 'En stock' : 'Indisponible'}}</div>
    <div>{{$price}}€</div>
    <p>{{$description}}</p>
    <img class="main-image" src="{{$mainurl}}" alt="{{$mainalt}}">
    <img class="image1" src="{{$url1}}" alt="{{$alt1}}">
    <img class="image2" src="{{$url2}}" alt="{{$alt2}}">
</div>
@endsection