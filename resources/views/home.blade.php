@extends('layouts.app')

@section('title', 'Todo App')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                {{-- <div class="card" style="width: 18rem;"> --}}
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5 class="card-title">{{ Auth::user()->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ __('You are logged in!') }}</h6>
                    <p class="card-text">Thank you {{ Auth::user()->name }} for choosing us!</p>
                    <a href="{{ route('apps.create') }}" class="card-link">Start Recording Todos</a>
                    <a href="/" class="card-link">Go to Home Page</a>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
