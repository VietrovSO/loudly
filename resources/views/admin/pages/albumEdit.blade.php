@extends('admin/layout')

<script>
    function init() {
        return {
            initialize() {
                console.log('test');
            }
        }
    }
</script>

@section('content')
    <form x-data="init()" x-init="initialize()" action="{{ route('adminAlbumUpdate') }}" method="POST"
        enctype="multipart/form-data">
        <div class="flex">
            <div class="w-1/3">
                <label for="images" class="w-96 h-96 album-item block relative cursor-pointer rounded-xl overflow-hidden">
                    @if (isset($image) && file_exists(public_path() . '/storage/images/albums/' . $image))
                        <img id="image-preview" class="w-full h-full object-cover cursor-pointer"
                            src="{{ asset('/storage/images/albums/' . $image) }}" />
                    @else
                        <img id="image-preview" class="w-full h-full object-cover cursor-pointer"
                            src="{{ asset('/storage/images/placeholder.jpg') }}" />
                    @endif
                    <div class="album-item-overlay hidden absolute top-0 left-0 h-full w-full bg-black/50">
                        <div class="flex h-full w-full3 flex-col justify-center items-center">
                            <img class="w-10" src="{{ asset('icons/add-image-white.png') }}" />
                        </div>
                    </div>
                </label>
                <input type="file" name="image" class="hidden" id="images">
            </div>
            <div class="w-2/5 pl-10">
                <div class="mb-2">
                    <a class="text-teal-700 inline-flex items-center border border-teal-700 font-semibold text-md border border-black rounded-full px-4 py-2"
                        href="{{ '/album/' . $album->id }}" target="_blank">View in site
                        <span class="ml-2"><img class="w-5" src="{{ asset('icons/link.png') }}" /></span>
                    </a>
                    <a class="text-red-700 ml-2 inline-flex items-center border border-red-700 font-semibold text-md border border-black rounded-full px-4 py-2"
                        href="{{ '/admin/albums/remove/' . $album->id }}">
                        Remove
                        <span class="ml-2"><img class="w-5" src="{{ asset('icons/remove.png') }}" /></span>
                    </a>
                    <button type="submit"
                        class="text-white ml-2 inline-flex bg-black border border-black items-center font-semibold text-md rounded-full px-4 py-2">
                        Save
                        <span class="ml-2"><img class="w-5" src="{{ asset('icons/save.png') }}" /></span>
                    </button>
                </div>
                <input type="hidden" value="{{ $album->id }}" name="id" />
                <div class="flex text-md flex-col">
                    <label for="title">Title:</label>
                    <input type="text" name="title" required
                        class="mt-1 text-2xl border border-black font-semibold px-5 py-2 rounded-lg focus:outline-black"
                        placeholder="Album title" value="{{ $album->title }}" />
                </div>
                <div class="flex text-md flex-col mt-5">
                    <label for="title">Author:</label>
                    <select name="author_id">
                        <option value="new">New Author</option>
                        @foreach ($allAuthors as $author)
                            <option {{ $author->id == $albumAuthor->id ? 'selected' : '' }} value={{ $author->id }}>
                                {{ $author->name }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="hidden" name="author_id" value="{{$albumAuthor->id}}"/>  --}}
                    <input id="author-input" name="author"
                        class=" hidden mt-3 text-md h-auto border border-black font-semibold px-5 py-2 rounded-lg"
                        placeholder="Album author" value="" />
                </div>
                <div class="flex text-md flex-col mt-5">
                    <label for="title">Genre:</label>
                    <select name="genre_id" id="genre">
                        <option value="new" >New Genre</option>
                        @foreach ($allGenres as $genre)
                            <option {{$genre->id == $albumGenre->id ? "selected" : ""}} value={{$genre->id}}>{{$genre->title}}</option>
                        @endforeach
                    </select>
                    <input id="genre-input" name="genre" class=" hidden mt-3 text-md h-auto border border-black font-semibold px-5 py-2 rounded-lg" placeholder="Album genre" value=""/>
                </div>
                <div class="flex text-md flex-col mt-5">
                    <label for="title">Release date:</label>
                    <input id="title" name="release_date" required
                        class="mt-1 text-md h-auto border border-black font-semibold px-5 py-2 rounded-lg"
                        placeholder="Album release date" value="{{ $album->release_date }}" />
                </div>
                <div class="flex text-md flex-col mt-5">
                    <label for="title">Description:</label>
                    <textarea id="title" type="text" name="description"
                        class="mt-1 resize-y max-h-40 min-h-[135px] text-md h-auto border border-black px-5 py-2 rounded-lg"
                        placeholder="Album description">{{ $album->description }}</textarea>
                </div>
            </div>
        </div>
        <div class="flex text-md flex-col mt-5">
            <label for="title">Songs:</label>
            <div class="block">
                <input type="file" name="song" id="song">
                @isset($songs)
                    {{-- <audio controls src="{{asset('/storage/images/albums/' . $songs)}}"></audio> --}}
                @endisset
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script type="text/javascript" src={{ asset('js/libs/jquery.selectric.min.js') }}></script>
    <link rel="stylesheet" href={{ asset('js/libs/selectric.css') }}>
    <script type="text/javascript" src={{ asset('js/admin/selectric.js') }}></script>
    <script src={{ asset('js/imageUpload/imageUpload.js') }} type="text/javascript"></script>
@endsection
