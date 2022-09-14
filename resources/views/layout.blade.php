<!DOCTYPE html>
<html>
<head>
    <title>Loudly</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
<div class="bg-neutral-900 z-10 h-24 flex items-center fixed w-full top-0">
    <div class="container text-white py-6 flex justify-between items-center mx-auto w-full">
        <div>
            <a class="text-4xl font-semibold" href="/">Loudly</a>
        </div>    

        <ul class="flex items-center ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Sign In</a>
                </li>
                <li class="nav-item ml-3">
                    <a href="{{ route('login') }}" class="bg-white text-black px-6 py-3 rounded-full font-semibold">
                        Log In
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
            @endguest
        </ul>
  
    </div>
</div>

@hasSection('content')
    <div class="container mx-auto pt-32">
        @yield('content')
    </div>
@endif

@hasSection('content-fluid')
    @yield('content-fluid')
@endif
    
</body>
</html>