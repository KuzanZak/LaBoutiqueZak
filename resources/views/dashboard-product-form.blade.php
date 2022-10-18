@extends('dashboard')
@section('pageJs', $pageJs)
@section('content')

<h2 class="title-dashboard">Ajout produits</h2>
<div class="content-back-link">
    <a href="{{ @route('dashboard/product')}}" class="back-button">Retour</a>
</div>
<form action="{{$action}}" method="post" enctype="multipart/form-data">
    @csrf
    <ul>
        <li class="form-items-dashboard">
            <label for="product_name">Nom du produit :
                @error('product_name')
                <span class="error-message">{{ $message}}</span>
                @enderror
            </label>
            <input class="input-dashboard" type="text" id="product_name" name="product_name" value="{{$product_name}}">
        </li>
        <li class="form-items-dashboard">
            <label for="description">Description du produit :
                @error('description')
                <span class="error-message">{{ $message}}</span>
                @enderror
            </label>
            <input class="input-dashboard" type="text" id="description" name="description" value="{{$description}}">
        </li>
        <li class="form-items-dashboard">
            <label for="price">Prix :
                @error('price')
                <span class="error-message">{{ $message}}</span>
                @enderror
            </label>
            <input class="input-dashboard" type="text" id="price" name="price" value="{{$price}}">
        </li>
        <li class="form-items-dashboard">
            <label for="stock">Quantité :
                @error('stock')
                <span class="error-message">{{ $message}}</span>
                @enderror
            </label>
            <input class="input-dashboard" type="text" id="stock" name="stock" value="{{$stock}}">
        </li>
        <li class="form-items-dashboard">
            <label for="category">Catégories :
                @error('category')
                <span class="error-message">{{ $message}}</span>
                @enderror
            </label>
            @foreach ($categories as $category)
            <div class="list-category">
                <label class="label-category">
                    <input class="input-category" type=radio name=category value="{{$category->id}}">{{$category->category_name}}
                </label>
            </div>
            @endforeach
        </li>
        <li class="form-items-dashboard">
            <label for="images">Images :</label>
            <ul class="list-dashboard">
                @foreach ($images as $image)
                <li class="form-items-dashboard">
                    <img class="image-update" src="{{asset($image->url)}}" alt="{{$image->alt}}">
                    <div class="inputs-images">
                        <input class="checkbox-image" type="checkbox" name="checkbox[]" value="{{$image->id}}">
                        <input class="radio-image" type="radio" name="main" value="{{$image->id}}">
                    </div>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="form-items-dashboard">
            <input class="button-dashboard" type="submit" id="submit" name="submit-image" value="{{$value}}">
        </li>
    </ul>
</form>
@endsection