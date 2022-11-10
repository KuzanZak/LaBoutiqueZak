@extends('dashboard')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<h2 class="title-dashboard">
    Account
</h2>
<ul class="list-account">
    <li class="list-account-items">
        <p>Civilité : {{Auth::user()->sexe}}</p>
    </li>
    <li class="list-account-items">
        <p>Nom : {{Auth::user()->name}}</p>
    </li>
    <li class="list-account-items">
        <p>Prénom : {{Auth::user()->firstname}}</p>
    </li>
    <li class="list-account-items">
        <p>Email : {{Auth::user()->email}}</p>
    </li>
    <li class="list-account-items">
        <p>Mot de passe : *******</p>
    </li>
    <li class="list-account-items">
        <p>Téléphone : {{Auth::user()->phone_number}}</p>
    </li>
    <li class="list-account-items">
        <p>Date de naissance : {{Auth::user()->date_of_birth}}</p>
    </li>
    <li class="list-account-items-modify">
        <a href="{{ @route('dashboard/account/edit', Auth::user()->id)}}" class="modify-button-account">Modifier</a>
    </li>
</ul>
@endsection