@extends('homepage')
@section('pageJs', $pageJs)
@section('content')
<section class="page-pics">
    <div id="titles-product" class="titles-product">
        <h1 class="title-detailed-product">{{$name}}</h1>
        <div class="page-product-description">
            <div class="rating-detailed-product">Note : ??/5</div>
        </div>
    </div>
    <div id="test" class="test">
        <div class="pictures">
            <button id="last-img" type="button" class="pictures-handler pictures-prev hidden">
                <img src="{{ URL::asset('/img/previous.png') }}" alt="previous">
            </button>
            <img id="display-img" class="pictures-img" src="{{$mainurl}}" alt="{{$mainalt}}">
            <button id="next-img" type="button" class="pictures-handler pictures-next">
                <img src="{{ URL::asset('/img/next.png') }}" alt="next">
            </button>
            <ul id="thumbs" class="thumbs">
                <li class="thumbs-itm">
                    <img id="img-1" class="thumbs-img" src="{{$mainurl}}" alt="{{$mainalt}}">
                </li>
                <li class="thumbs-itm">
                    <img id="img-2" class="thumbs-img" src="{{$url1}}" alt="{{$alt1}}">
                </li>
                <li class="thumbs-itm">
                    <img id="img-3" class="thumbs-img" src="{{$url2}}" alt="{{$alt2}}">
                </li>
            </ul>
        </div>
        <div id="price" class="price">{{$price}}€</div>
        <div id="add" class="add">
            <input id="add-qty" class="add-qty" type="text" value="1">
            <button id="add-cta" class="add-cta" type="button">Ajouter au panier</button>
        </div>
    </div>
    <div class="description">
        <h2 class="subtitle-description">Description : </h2>
        <p>{{$description}}</p>
    </div>
</section>


@endsection