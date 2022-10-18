@extends('dashboard')
@section('content')

<h2 class="title-dashboard">
    Categories
</h2>
<div class="content-add-link">
    <a href="{{ @route('dashboard/category/create')}}" class="add-button">Ajouter</a>
</div>
<ul class="list-dashboard">
    @foreach($categories as $category)
    <li class="list-items-dashboard">
        <p class="data-dashboard"><span class="span-title-dashboard">Id :</span> {{ $category->id }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Catégorie :</span> {{ $category->category_name }}</p>
        @if($admin === 1)
        <p><span class="span-title-dashboard">Supprimé :</span>
            <a href="{{ @route('dashboard/category/delete', $category->id)}}">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
            </a>
        </p>
        <p><span class="span-title-dashboard">Modifié :</span>
            <a href="{{ @route('dashboard/category/edit', $category->id)}}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
        </p>
        @endif
    </li>
    @endforeach
</ul>
@endsection