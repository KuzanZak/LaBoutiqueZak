@extends('dashboard')
@section('content')

<h2 class="title-dashboard">
    Produits
</h2>
<div class="content-add-link">
    <a href="{{ @route('dashboard/product/create')}}" class="add-button">Ajouter</a>
</div>
<ul class="list-dashboard">
    @foreach($products as $product)
    <li class="list-items-dashboard">
        <p class="data-dashboard"><span class="span-title-dashboard">Id :</span> {{ $product->id }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Nom du produit :</span> {{ $product->product_name }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Description du produit :</span> {{ $product->description }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Prix :</span> {{ $product->price }}€</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Quantité:</span> {{ $product->stock }} unités</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Catégorie:</span> {{ $product->category->category_name }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Image principale:</span> {{ $product->image_id }}</p>
        @if($admin === 1)
        <p><span class="span-title-dashboard">Supprimé :</span>
            <a href="{{ @route('dashboard/product/delete', $product->id)}}">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
            </a>
        </p>
        <p><span class="span-title-dashboard">Modifié :</span>
            <a href="{{ @route('dashboard/product/edit', $product->id)}}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
        </p>
        @endif
    </li>
    @endforeach
</ul>
@endsection