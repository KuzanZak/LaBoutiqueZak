@extends('dashboard')
@section('content')

<h2 class="title-dashboard">
    Categories
</h2>
@if($admin === 1)
<div class="content-add-link">
    <a href="{{ @route('dashboard/category/create')}}" class="add-button">Ajouter</a>
</div>
@endif
<table class="table">
    <tbody>
        <tr class="header-table">
            <td class="little-cells-header">Id</td>
            <td class="middle-cells-header">Nom</td>
            @if($admin === 1)
            <td class="little-cells-header"></td>
            @endif
        </tr>
        @foreach($categories as $category)
        <tr class="content-table">
            <td class="little-cells">{{ $category->id }}</td>
            <td class="middle-cells">{{ $category->category_name }}</td>
            @if($admin === 1)
            <td class="little-cells">
                <a href="{{ @route('dashboard/category/delete', $category->id)}}" class="links">Supprimer </a>/
                <a href="{{ @route('dashboard/category/edit', $category->id)}}" class="links">Modifier </a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection