@extends('admin/layout')
  
@section('content')
<form action="{{ route('adminCreateAlbums') }}" method="POST">
    <div class="flex">
        <div class="w-1/3">
            <p class="text-xl mb-4">Image:</p>
                <button>
                    <img class="w-full rounded-xl" src="{{asset('images/addImage.png')}}"/>
                </button>
        </div>
        <div class="w-2/5 pl-10">
            <a class="text-teal-700 inline-flex items-center border border-black font-semibold text-md border border-black rounded-full px-4 py-2 mb-4"
             href=""
             target="_blank">View in site
                <span class="ml-2"><img class="w-5" src="{{ asset('icons/link.png') }}"/></span>
            </a>
                <div class="flex text-md flex-col">
                    <label for="title">Title:</label>
                    <input id="title" class="mt-1 text-2xl border border-black font-semibold px-5 py-2 rounded-lg" name="title" placeholder="Album title"/>
                </div>
                <div class="flex text-md flex-col mt-5">
                    <label for="title">Author:</label>
                    <input id="title" class="mt-1 text-md h-auto border border-black font-semibold px-5 py-2 rounded-lg" name="author_id" placeholder="Album author"/>
                </div>
                <div class="flex text-md flex-col mt-5">
                    <label for="title">Release date:</label>
                    <input id="title" class="mt-1 text-md h-auto border border-black font-semibold px-5 py-2 rounded-lg" name="release_date" placeholder="Album release date" />
                </div>
                <div class="flex text-md flex-col mt-5">
                    <label for="title">Description:</label>
                    <textarea id="title" class="mt-1 resize-y max-h-40 min-h-3 text-md h-auto border border-black font-semibold px-5 py-2 rounded-lg" name="description" placeholder="Album description"></textarea>
                </div>
                <button type="submit" class="inline-block bg-black text-white px-6 py-3 mt-4 rounded-full font-semibold">
                    Save
                </button>
                {{-- <p class="text-4xl">{{$album->title}}</p> --}}
        </div>
    </div>
</form>
@endsection