@extends('layout')
  
@section('content-fluid')
<main class="login-form bg-admin h-screen bg-cover relative flex justify-center items-center">
    <div class="w-min relative left-48">
        <div class="bg-white/75 p-10">
            <div class="card-header text-3xl font-semibold mb-6">Admin Login</div>
            <form action="{{route('adminLoginPost')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="email_address" class="text-sm">E-Mail</label>
                    <div class="col-md-6">
                        <input type="text" id="email_address" class="w-72 p-2 bg-transparent border border-2 border-black text-base mt-2" name="email" required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mt-3">
                    <label for="password" class="text-sm">Password</label>
                    <div class="col-md-6">
                        <input type="password" id="password" class="w-72 p-2 bg-transparent border border-2 border-black text-base  mt-2" name="password" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>

                <div class="mt-2">
                    <div class="col-md-6 offset-md-4">
                        <div class="checkbox">
                            <label>
                                {{-- <input type="checkbox" name="remember"> Remember Me --}}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-black text-white px-6 py-3 rounded-full font-semibold">
                        Login
                    </button>
                </div>
            </form>    
  </div>
</main>
@endsection