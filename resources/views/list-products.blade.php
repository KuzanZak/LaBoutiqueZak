@extends('homepage')
@section('pageJs', $pageJs)
@section('content')

<section class="page-product">
    <h1 class="title-page-product">Tous les produits</h1>
    <div class="sort-by-filter">
        <form action="{{@route('list-products')}}" id="form-sorting" class="form-sorting" method="get" enctype="multipart/form-data">
            @csrf
            <select name="sorting" id="sorting" class="sort_by" data-default-sort="created-descending">
                <!-- <option value="best-selling">Meilleures ventes</option>
            <option value="title-ascending">Par ordre alphabétique : A-Z</option>
            <option value="title-descending">Par ordre alphabétique : Z-A</option> -->
                <option value="">Trier par</option>
                <option value="price-ascending" {{($sorting == 'price-ascending') ? 'selected' : ''}}>Par prix : Ordre croissant</option>
                <option value="price-descending" {{($sorting == 'price-descending') ? 'selected' : ''}}>Par prix : Ordre décroissant</option>
                <option value="created-ascending" {{($sorting == 'created-ascending') ? 'selected' : ''}}>Par date : du moins récent au plus récent</option>
                <option value="created-descending" {{($sorting == 'created-descending') ? 'selected' : ''}}>Par date : du plus récent au moins récent</option>
            </select>
            <!-- <button>submit</button> -->
        </form>
    </div>
    <ul class="list-products">
        @foreach($products as $product)
        <li class="list-products-items">
            <a href="{{ @route('detailed-products', $product->id)}}">
                <img class="main-image" src="{{$product->mainImage->url}}" alt="{{$product->mainImage->alt}}">
            </a>
            <div class="page-product-description">
                <h2 class="title-product">{{$product->product_name}}</h2>
                <div class="rating-product">Note : ??/5</div>
                <div>{{$product->stock > 0 ? 'En stock' : 'Indisponible'}}</div>
                <div>{{$product->price}}€ / pce</div>
            </div>
            <div class="price-product">{{$product->price}}€</div>
            <div class="add-buttons">
                <a href="#">
                    <!-- <i class="fa fa-star add-to-favorite" aria-hidden="true"></i> -->
                    <i class="fa fa-star-o add-to-favorite" aria-hidden="true"></i>
                </a>
                <a href="#"><i class="fa fa-shopping-basket add-to-shopping-cart" aria-hidden="true"></i></a>
            </div>
        </li>
        @endforeach
    </ul>

</section>


@endsection