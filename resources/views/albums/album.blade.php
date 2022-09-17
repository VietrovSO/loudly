@extends('layout')
@section('content')

    <h1>{{$album->title}}</h1>

    <p>{{$album->release_date}}</p>
    <h3>{{$author->name}}</h3>

    <form method="POST" action="/upload" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <input type="submit" name="Upload">
    </form>
 <ul>
    @foreach($photos as $photo)
    <li>{{$photo->name}}<img src="{{asset('storage/images/'. $photo->name)}}"/></li>
    @endforeach
</ul>
@endsection