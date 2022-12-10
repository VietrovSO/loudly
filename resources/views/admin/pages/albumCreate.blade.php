@extends('admin/layout')
  

@section('content')
<form action="{{ route('adminCreateAlbums') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex">
        <div class="w-1/3">
            <p class="text-xl mb-4">Image:</p>
                <label for="images" class="block h-96 w-96 relative cursor-pointer rounded-xl" id="images_input">
                    <div class="w-full h-full border border-black flex justify-center items-center rounded-xl overflow-hidden">
                        <img class="w-24" id="icon-preview" src="{{asset('icons/add-image.png')}}"/>
                        <img src="" class="w-full h-full hidden object-cover" id="image-preview" alt="">
                    </div>
                </label>
                <input type="file" name="image"  id="images" class="hidden">
                <input type="submit" name="Upload" id="images" class="hidden">
            </div>
        <div class="w-2/5 pl-10">
                <div class="flex text-md flex-col">
                    <label for="title">Title:</label>
                    <input id="title" required class="mt-1 text-2xl border border-black font-semibold px-5 py-2 rounded-lg" name="title" placeholder="Album title"/>
                </div>
                <div class="flex text-md flex-col mt-5">
                    <label for="title">Author:</label>
                    <select name="author_id">
                        <option value="new">New Author</option>
                        @foreach ($allAuthors as $author)
                            <option value={{$author->id}}>{{$author->name}}</option>
                        @endforeach
                      </select>
                    <input id="author-input" name="author" class="mt-3 text-md h-auto border border-black font-semibold px-5 py-2 rounded-lg" placeholder="Album author" value=""/>
                </div>
                <div class="flex text-md flex-col mt-5">
                    <label for="title">Genre:</label>
                    <select name="genre_id" id="genre">
                        <option value="new">New Genre</option>
                        @foreach ($allGenres as $genre)
                            <option value={{$genre->id}}>{{$genre->title}}</option>
                        @endforeach
                    </select>
                    <input id="genre-input" name="genre" class="mt-3 text-md h-auto border border-black font-semibold px-5 py-2 rounded-lg" placeholder="Album genre" value=""/>
                </div>
                <div class="flex text-md flex-col mt-5">
                    <label for="releaseDate">Release date:</label>
                    <input id="releaseDate" required class="mt-1 text-md h-auto border border-black font-semibold px-5 py-2 rounded-lg" name="release_date" placeholder="Album release date" />
                </div>
                <div class="flex text-md flex-col mt-5">
                    <label for="description">Description:</label>
                    <textarea id="description" class="mt-1 resize-y max-h-40 min-h-3 text-md h-auto border border-black font-semibold px-5 py-2 rounded-lg" name="description" placeholder="Album description"></textarea>
                </div>
                <button type="submit" class="inline-block bg-black text-white px-6 py-3 mt-4 rounded-full font-semibold">
                    Save
                </button>
                {{-- <p class="text-4xl">{{$album->title}}</p> --}}
        </div>
    </div>
    {{-- <div class="block">
        <input type="file" name="song" id="songs">
    </div> --}}
</form>
@endsection

@section('scripts')
    <script type="text/javascript" src={{ asset('js/libs/jquery.selectric.min.js')}}></script>
    <link rel="stylesheet" href={{ asset('js/libs/selectric.css')}}>
    <script type="text/javascript" src={{ asset('js/admin/selectric.js')}}></script>
    <script src={{asset('js/imageUpload/imageUpload.js')}} type="text/javascript"></script>
@endsection
