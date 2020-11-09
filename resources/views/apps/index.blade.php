{{-- connect to layouts --}}
@extends('layouts.app')
{{-- title name --}}
@section('title', 'Todo App')

@section('content')
<div class="container">
    <a href="{{ route('apps.create') }}" class="btn btn-outline-primary">Create New Todo</a>
    {{-- if success added new todo --}}
    @if (session()->get('success'))
        <div class="alert mt-3 alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th class="text-center" scope="col">Id</th>
                <th class="text-center" scope="col">Text</th>
                <th class="text-center" scope="col">Date</th>
                <th class="text-center" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @php 
        $num = ($todos->currentPage() - 1) * $todos->perPage() + 1; 
        @endphp
        @foreach ($todos as $todo)
                
            <tr>
                <th class="text-center" scope="row">{{ $num }}</th>
                <td class="text-center">{{ $todo->title }}</td>
                <td class="text-center">{{ $todo->published_date }}</td>
                <td class="table-btn">
                    <a href="{{ route('apps.edit', $todo->id) }}" class="btn btn-primary">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <form method="POST" action="{{ route('apps.destroy', $todo->id) }}">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @php
                $num++;
            @endphp
        @endforeach
        </tbody>
    </table>

    {!! $todos->links() !!}
</div>
@endsection