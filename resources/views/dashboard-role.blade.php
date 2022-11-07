@extends('dashboard')
@section('content')

<h2 class="title-dashboard">
    Roles
</h2>
@if($admin === 1)
<div class="content-add-link">
    <a href="{{ @route('dashboard/role/create')}}" class="add-button">Ajouter</a>
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
        @foreach($roles as $role)
        <tr class="content-table">
            <td class="little-cells">{{ $role->id }}</td>
            <td class="middle-cells">{{ $role->role_name }}</td>
            @if($admin === 1)
            <td class="little-cells">
                <a href="{{ @route('dashboard/role/delete', $role->id)}}" class="links">Supprimer </a>/
                <a href="{{ @route('dashboard/role/edit', $role->id)}}" class="links">Modifier </a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection