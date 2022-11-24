@extends('admin/layout')

@section('title', 'Authors')

@section('content')
    <div>
        <div class="leading-none text-4xl font-semibold"> Authors</div>
        <div class="mt-4 border-black w-full">
            <div class="flex py-4 px-2 text-xl font-semibold w-full">
                <span class="w-1/5">Title</span>
                <span class="w-1/5 text-center">Albums</span>
                <span class="w-1/5 text-right">Actions</span>
            </div>
            @foreach ($authors as $author)
                <div class="flex border-t py-4 px-2 text-lg items-center">
                    <span class="w-1/5">{{ $author->name }}</span>
                    <span class="w-1/5 text-center">{{ $author->albumsCount }}</span>
                    <div class="w-1/5 flex justify-end">
                        <div>
                            <img class="w-6" src="{{ asset('icons/edit.png') }}" />
                        </div>
                        <a href="{{ '/admin/authors/remove/' . $author->id }}" class="transition hover:bg-gray-300 rounded-full h-10 w-10 flex justify-center items-center">
                            <img class="w-6" src="{{ asset('icons/remove.png') }}" />
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
