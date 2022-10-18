@extends('dashboard')
@section('pageJs', $pageJs)
@section('content')

<h2 class="title-dashboard">Ajout catégories</h2>
<div class="content-back-link">
    <a href="{{ @route('dashboard/category')}}" class="back-button">Retour</a>
</div>
<form action="{{$action}}" method="post" enctype="multipart/form-data">
    @csrf
    <ul>
        <li class="form-items-dashboard">
            <label for="category">Catégorie :
                @error('category')
                <span class="error-message">{{ $message}}</span>
                @enderror
            </label>
            <input class="input-dashboard" type="text" id="category" name="category" value="{{$category}}">
        </li>
        <li class="form-items-dashboard">
            <input class="button-dashboard" type="submit" id="submit" name="submit-image" value="{{$value}}">
        </li>
    </ul>
</form>
@endsection