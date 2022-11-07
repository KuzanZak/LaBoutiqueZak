@extends('dashboard')
@section('pageJs', $pageJs)
@section('content')

<h2 class="title-dashboard">
    Produits
</h2>
@if($admin === 1)
<div class="content-add-link">
    <a href="{{ @route('dashboard/product/create')}}" class="add-button">Ajouter</a>
</div>
@endif
<table class="table">
    <tbody>
        <tr class="header-table">
            <td class="little-cells-header">Id</td>
            <td class="middle-cells-header">Nom</td>
            <td class="big-cells-header selected hidden">Description</td>
            <td class="little-cells-header">Prix</td>
            <td class="little-cells-header">Quantité</td>
            <td class="middle-cells-header selected hidden">Catégorie</td>
            <td class="little-cells-header selected hidden">Image principale</td>
            @if($admin === 1)
            <td class="little-cells-header"></td>
            @endif
        </tr>
        @foreach($products as $product)
        <tr class="content-table">
            <td class="little-cells">{{ $product->id }}</td>
            <td class="middle-cells">{{ $product->product_name }}</td>
            <td class="big-cells selected hidden">{{ $product->description}}</td>
            <td class="little-cells">{{ $product->price }}€</td>
            <td class="little-cells">{{ $product->stock }}</td>
            <td class="middle-cells selected hidden">{{ $product->category->category_name}}</td>
            <td class="little-cells selected hidden">{{ $product->image_id }}</td>
            @if($admin === 1)
            <td class="little-cells">
                <a href="{{ @route('dashboard/product/delete', $product->id)}}" class="links">Supprimer </a>/
                <a href="{{ @route('dashboard/product/edit', $product->id)}}" class="links">Modifier </a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection