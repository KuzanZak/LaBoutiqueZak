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
<div class="content-back-link">
    <a href="{{ @route('dashboard/account')}}" class="back-button">Retour</a>
</div>
<form action="{{ @route('dashboard/account/update', Auth::id())}}" method="post">
    @csrf
    <ul class="form-list-dashboard">
        <li class="form-items-dashboard-civility">
            <label for="sexe">Civilité : </label>
            <select name="sexe" id="sexe" class="select-sexe">
                <option value="{{Auth::user()->sexe}}">--Civilité--</option>
                <option value="man" {{Auth::user()->sexe === "man" ? "selected" : ""}}>M.</option>
                <option value="women" {{Auth::user()->sexe === "women" ? "selected" : ""}}>Mme.</option>
            </select>
        </li>
        <li class="form-items-dashboard">
            <label for="name">Nom :</label>
            <input class="input-dashboard" type="text" id="name" name="name" value="{{Auth::user()->name}}">
        </li>
        <li class="form-items-dashboard">
            <label for="firstname">Prénom : </label>
            <input class="input-dashboard" type="text" id="firstname" name="firstname" value="{{Auth::user()->firstname}}">
        </li>
        <li class="form-items-dashboard">
            <label for="email">Email : </label>
            <input class="input-dashboard" type="email" id="email" name="email" value="{{Auth::user()->email}}">
        </li>
        <li class="form-items-dashboard">
            <label for="password">Mot de passe : </label>
            <input class="input-dashboard" type="password" id="password" name="password" value="">
        </li>
        <li class="form-items-dashboard">
            <label for="phone_number">Téléphone : </label>
            <input class="input-dashboard" type="text" id="phone_number" name="phone_number" min="10" max="10" value="{{Auth::user()->phone_number}}">
        </li>
        <li class="form-items-dashboard">
            <label for="date_of_birth">Date de naissance : </label>
            <input class="input-dashboard" type="date" id="date_of_birth" name="date_of_birth" value="{{Auth::user()->date_of_birth}}">
        </li>
        <li class="form-items-dashboard">
            <input class="button-dashboard" type="submit" id="submit" name="submit" value="Valider">
        </li>
    </ul>
</form>

@endsection