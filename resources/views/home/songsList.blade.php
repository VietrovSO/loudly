@extends('layout')
@section('content')

    <h1>Songs</h1>

    @foreach($songs as $key => $data)
        <p>{{ $data->title }}</p>
    @endforeach

@endsection