@extends('homepage')
@section('content')

<section class="page-product">
    <ul class="list-products">
        @foreach($products as $product)
        <li class="list-products-items">
            <img class="main-image" src="{{$product->mainImage->url}}" alt="{{$product->mainImage->alt}}">
            <div class="page-product-description">
                <h2 class="title-product">{{$product->product_name}}</h2>
                <div class="rating-product">Note : ??/5</div>
                <div class="price-product">{{$product->price}}€</div>
                <div>{{$product->stock > 0 ? 'En stock' : 'Indisponible'}}</div>
                <div class="add-buttons">
                    <a href="#">
                        <i class="fa fa-star add-to-favorite" aria-hidden="true"></i>
                        <!-- <i class="fa fa-star-o" aria-hidden="true"></i> -->
                    </a>
                    <a href="#"><i class="fa fa-shopping-basket add-to-shopping-cart" aria-hidden="true"></i></a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>

</section>


@endsection