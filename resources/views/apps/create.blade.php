{{-- connect to layouts --}}
@extends('layouts.app')
{{-- title name --}}
@section('title', 'Add New Todo')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="error_list">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('apps.store') }}">
        @csrf
        <div class="form-group">
            <label for="title_label">Add New Todo</label>
            <input value="{{ old('title') }}" name="title" placeholder="Enter here..." type="text" class="form-control" id="app-title">
        </div>
        <button type="submit" class="btn btn-outline-success">Submit</button>
    </form>

</div>
@endsection
