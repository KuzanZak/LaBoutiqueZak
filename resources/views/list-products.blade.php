@extends('homepage')
@section('content')

<section class="page-product">
    <ul class="list-products">
        @foreach($products as $product)
        <li class="list-products-items">
            <img class="main-image" src="{{$product->mainImage->url}}" alt="{{$product->mainImage->alt}}">
            <div>
                <h2 class="title-product">{{$product->product_name}}</h2>
                <div class="rating-product">Note : ??/5</div>
                <div class="price-product">{{$product->price}}€</div>
                <div>Disponibilité : {{$product->stock > 0 ? 'En stock' : 'Indisponible'}}</div>
            </div>
        </li>
        @endforeach
    </ul>

</section>


@endsection