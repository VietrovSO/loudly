@extends('admin/layout')
  
@section('content')
    <div class="flex">
        <div class="w-1/3">
            <p class="text-xl mb-4">Image:</p>
            <img class="w-full rounded-xl" src="{{asset("albums/" . $image)}}"/>
        </div>
        <div class="w-2/5 pl-10">
            <a class="text-teal-700 inline-flex items-center border border-black font-semibold text-md border border-black rounded-full px-4 py-2 mb-4"
             href="{{"/album/" . $album->id}}"
             target="_blank">View in site
                <span class="ml-2"><img class="w-5" src="{{ asset('icons/link.png') }}"/></span>
            </a>
            <form action="{{route('adminAlbumUpdate')}}" method="POST">
                <input type="hidden" value="{{$album->id}}" name="id"/>
                <div class="flex text-md flex-col">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="mt-1 text-2xl border border-black font-semibold px-5 py-2 rounded-lg focus:outline-black" placeholder="Album title" value="{{$album->title}}" />
                </div>
                <div class="flex text-md flex-col mt-5">
                    <label for="title">Author:</label>
                    <input type="hidden" name="author_id" value="{{$author->id}}"/>
                    <input id="title" name="author" class="mt-1 text-md h-auto border border-black font-semibold px-5 py-2 rounded-lg" placeholder="Album author" value="{{$author->name}}"/>
                </div>
                <div class="flex text-md flex-col mt-5">
                    <label for="title">Release date:</label>
                    <input id="title" name="release_date" class="mt-1 text-md h-auto border border-black font-semibold px-5 py-2 rounded-lg" placeholder="Album release date" value="{{$album->release_date}}"/>
                </div>
                <div class="flex text-md flex-col mt-5">
                    <label for="title">Description:</label>
                    <textarea id="title" type="text" name="description" class="mt-1 resize-y max-h-40 min-h-16 text-md h-auto border border-black font-semibold px-5 py-2 rounded-lg" placeholder="Album description">{{$album->description}}</textarea>
                </div>
                <button type="submit" class="inline-block bg-black text-white px-6 py-3 mt-4 rounded-full font-semibold">
                    Save
                </button>
                {{-- <p class="text-4xl">{{$album->title}}</p> --}}
            </form>
        </div>
    </div>
@endsection