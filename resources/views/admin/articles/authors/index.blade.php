@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Authors</h1>

    <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Create Author</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author['name'] }}</td>
                    <td>{{ $author['email'] }}</td>
                    <td>
                        <a href="{{ route('authors.edit', $author['id']) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('authors.destroy', $author['id']) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
