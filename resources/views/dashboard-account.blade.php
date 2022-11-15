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
    Mon compte
</h2>
<ul class="list-account">
    <li class="list-account-items">
        <div class="list-account-datas">
            <h3 class="title-list-account">Civilité :</h3>
            <p> {{Auth::user()->sexe === "man" ? "Homme" : "Femme"}}</p>
        </div>
        <a href="{{ @route('dashboard/account/edit', Auth::user()->id)}}" class="modify-button-account">Modifier</a>
    </li>
    <li class="list-account-items">
        <div class="list-account-datas">
            <h3 class="title-list-account">Nom :</h3>
            <p>{{Auth::user()->name}}</p>
        </div>
        <a href="{{ @route('dashboard/account/edit', Auth::user()->id)}}" class="modify-button-account">Modifier</a>
    </li>
    <li class="list-account-items">
        <div class="list-account-datas">
            <h3 class="title-list-account">Prénom :</h3>
            <p>{{Auth::user()->firstname}}</p>
        </div>
        <a href="{{ @route('dashboard/account/edit', Auth::user()->id)}}" class="modify-button-account">Modifier</a>
    </li>
    <li class="list-account-items">
        <div class="list-account-datas">
            <h3 class="title-list-account">Email :</h3>
            <p>{{Auth::user()->email}}</p>
        </div>
        <a href="{{ @route('dashboard/account/edit', Auth::user()->id)}}" class="modify-button-account">Modifier</a>
    </li>
    <li class="list-account-items">
        <div class="list-account-datas">
            <h3 class="title-list-account">Mot de passe :</h3>
            <p>*******</p>
        </div>
        <a href="{{ @route('dashboard/account/edit', Auth::user()->id)}}" class="modify-button-account">Modifier</a>
    </li>
    <li class="list-account-items">
        <div class="list-account-datas">
            <h3 class="title-list-account">Téléphone :</h3>
            <p>{{Auth::user()->phone_number}}</p>
        </div>
        <a href="{{ @route('dashboard/account/edit', Auth::user()->id)}}" class="modify-button-account">Modifier</a>
    </li>
    <li class="list-account-items">
        <div class="list-account-datas">
            <h3 class="title-list-account">Date de naissance :</h3>
            <p>{{Auth::user()->date_of_birth}}</p>
        </div>
        <a href="{{ @route('dashboard/account/edit', Auth::user()->id)}}" class="modify-button-account">Modifier</a>
    </li>
</ul>
@endsection