{{-- connect to layouts --}}
@extends('layouts.app')
{{-- title name --}}
@section('title', 'Todo in Laravel')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update a Todo</h1>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br> 
            @endif
            <form method="post" action="{{ route('apps.update', $todo_edit->id) }}">
                @method('PATCH') 
                @csrf
                <div class="form-group">
                    <label for="first_name">Edit Todo:</label>
                    <input required type="text" class="form-control" name="title" value={{ $todo_edit->title }} />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection