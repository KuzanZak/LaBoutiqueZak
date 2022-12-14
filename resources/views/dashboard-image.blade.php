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
    Images
</h2>
@if($admin === 1)
<div class="content-add-link">
    <a href="{{ @route('dashboard/image/create')}}" class="add-button">Ajouter</a>
</div>
@endif
<ul class="list-dashboard">
    @foreach($images as $image)
    <li class="list-items-dashboard">
        <p><img src="{{asset($image->url)}}"></p>
        <!-- /laboutiquezak/laboutique/storage/app/{{$image->url}} -->
        <p class="data-dashboard"><span class="span-title-dashboard">Id :</span> {{ $image->id }}</p>
        @if($admin === 1)
        <p><span class="span-title-dashboard">Supprimé :</span>
            <a href="{{ @route('dashboard/image/delete', $image->id)}}">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
            </a>
        </p>
        <p><span class="span-title-dashboard">Modifié :</span>
            <a href="{{ @route('dashboard/image/edit', $image->id)}}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
        </p>
        @endif
        <hr>
    </li>
    @endforeach
</ul>
@endsection