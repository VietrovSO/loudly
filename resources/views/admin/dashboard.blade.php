@extends('admin/layout')
  
@section('content')
<div class="flex">
    <div class="container mx-auto">
        <div class="card">
            <div class="text-2xl font-semibold">{{ __('Dashboard') }}</div>
                
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection