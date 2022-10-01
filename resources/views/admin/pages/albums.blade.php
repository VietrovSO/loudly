@extends('admin/layout')
  
@section('content')
<div class="flex">
    <div class="container mx-auto">
        <div class="card">
            <div class="flex justify-between">
                <div class="flex">
                    <div class="leading-none text-4xl font-semibold">{{ __('Albums') }}</div>
                    <a href="{{ route('adminCreateAlbums') }}" class="ml-4 font-semibold text-md border border-black rounded-full flex justify-center items-center px-4">
                        + Add
                    </a>
                </div>
                <div class="border border-black rounded-full px-4 flex">
                    <input class="focus:outline-none" type="text" placeholder="Search Albums...">
                    <button>
                        <img class="w-5" src="{{ asset('icons/search.png') }}"/>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-4 gap-10 mt-6">
                @foreach ($albums as $album)
                    <div class="col-span-1">
                        <a class="album-item block overflow-hidden relative transition transform hover:scale-95 shadow-xl rounded-lg" href={{"albums/" . $album->id}}>
                            <div class="">       
                                <img class="w-full" src="{{ asset('/storage/images/albums/'. $album->image) }}"/>
                            </div>
                            <div class="album-item-overlay hidden absolute top-0 left-0 h-full w-full bg-black/50">
                                <div class="flex h-full w-full3 flex-col justify-center items-center">
                                    <img class="w-10" src="{{ asset('icons/edit.png') }}"/>
                                </div>
                            </div>
                        </a>
                        <div class="mt-3 p-2">
                            <a href={{"albums/" . $album->id}}><p class="font-bold text-2xl"> {{ $album->title }}</p></a>
                            <p class="text-sm"> {{ $album->release_date }}</p> 
                            <p class="text-sm font-semibold"> {{ $album->author }}</p> 
                        </div>
                    </div>
                @endforeach
            </div>
                
            <div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src={{ asset('js/admin/albums.js')}}></script>
@endsection
