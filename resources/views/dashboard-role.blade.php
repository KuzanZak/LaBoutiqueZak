@extends('dashboard')
@section('content')

<h2 class="title-dashboard">
    Roles
</h2>
<div class="content-add-link">
    <a href="{{ @route('dashboard/role/create')}}" class="add-button">Ajouter</a>
</div>
<ul class="list-dashboard">
    @foreach($roles as $role)
    <li class="list-items-dashboard">
        <p class="data-dashboard"><span class="span-title-dashboard">Id :</span> {{ $role->id }}</p>
        <p class="data-dashboard"><span class="span-title-dashboard">Rôle :</span> {{ $role->role_name }}</p>
        @if($admin === 1)
        <p><span class="span-title-dashboard">Supprimé :</span>
            <a href="{{ @route('dashboard/role/delete', $role->id)}}">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
            </a>
        </p>
        <p><span class="span-title-dashboard">Modifié :</span>
            <a href="{{ @route('dashboard/role/edit', $role->id)}}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
        </p>
        @endif
    </li>
    @endforeach
</ul>
@endsection