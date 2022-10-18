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
        <p class="data-dashboard"><span class="span-title-dashboard">Prix :</span> {{ $product->price }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Quantité:</span> {{ $product->stock }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Catégorie:</span> {{ $product->category_id }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Image principale:</span> {{ $product->image_id }}</p>
    </li>
    @endforeach
</ul>
@endsection