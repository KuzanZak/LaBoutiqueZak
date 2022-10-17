@extends('dashboard')
@section('pageJs', $pageJs)
@section('content')

<h2 class="title-dashboard">Ajout images</h2>
<div class="content-back-link">
    <a href="{{ @route('dashboard/role')}}" class="back-button">Retour</a>
</div>
<form action="{{$action}}" method="post" enctype="multipart/form-data">
    @csrf
    <ul>
        <li class="form-items-dashboard">
            <label for="role">Rôle :
                @error('role')
                <span class="error-message">{{ $message}}</span>
                @enderror
            </label>
            <input class="input-dashboard" type="text" id="role" name="role" value="{{$role}}">
        </li>
        <li class="form-items-dashboard">
            <input class="button-dashboard" type="submit" id="submit" name="submit-image" value="{{$value}}">
        </li>
    </ul>
</form>
@endsection