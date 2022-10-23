@extends('layout')
@section('content')

    <div class="container pt-8 flex w-full">
        <div class="w-2/5 pr-8 pt-8">
            <img src={{asset('/storage/images/albums/' . $image)}} 
                alt="Image album" 
                class="w-full rounded-lg relative overflow-hidden"
            />
        </div>
        <div class="w-3/5">
            <h1 class="text-6xl font-bold">{{$album->title}}</h1>
            <div class="flex items-center mt-4 mb-4">
                <a href="#" class="text-2xl font-semibold">{{$author->name}}</a>      
                <span class="mx-1 text-2xl"> • </span>
                @if(isset($album->release_date))
                    <span class="text-xl font-bold">{{$album->release_date}}</span>
                @endif    
            </div>

            @if(isset($album->description))
                <p class="text-sm w-3/5">{{$album->description}}</p>
            @endif
        </div>
    </div>
@endsection