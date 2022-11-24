<!DOCTYPE html>
<html>
<head>
    <title>Loudly | @yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/libs/jquery.min.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>

<div class="bg-neutral-900 z-10 h-24 flex items-center fixed w-full top-0">
    <div class="container text-white py-6 flex justify-between items-center mx-auto w-full">
        <div class="flex flex-col">
            <a class="text-4xl font-semibold leading-none" href="{{ route('adminDashboard') }}"> Loudly</a>
            <span class="text-base font-normal leading-none mt-1">Admin</span>
        </div>    

        <ul class="flex items-center ml-auto">
            <li class="nav-item mr-5">
                <a class="nav-link" href="{{ route('adminDashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item mr-5">
                <a class="nav-link" href="{{ route('adminAlbums') }}">Albums</a>
            </li>
            <li class="nav-item mr-5">
                <a class="nav-link" href="{{ route('adminAuthors') }}">Authors</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('adminUsers') }}">Users</a>
            </li> --}}
        </ul>
    
        <ul class="flex items-center ml-auto">
            <li class="nav-item font-semibold text-xl flex">
                <a class="nav-link flex items-center" href="{{ route('adminLogout') }}">Logout
                    <span class="ml-3">
                        <img class="w-5" src="{{ asset('icons/logout.png') }}"/>
                    </span>  
                </a>
            </li>
        </ul>
    
    </div>
</div>    

@hasSection('content')
    <div class="container mx-auto pt-32">
        @yield('content')
    </div>
@endif

@hasSection('scripts')
    @yield('scripts')
@endif

</body>
</html>
