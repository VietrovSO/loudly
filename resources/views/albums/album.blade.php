@extends('layout')
@section('content')

    <h1>{{$album->title}}</h1>

    <p>{{$album->release_date}}</p>
    <h3>{{$author->name}}</h3>
@endsection