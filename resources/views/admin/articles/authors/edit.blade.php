@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Author</h1>

    <form action="{{ route('authors.update', $author['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $author['name'] }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $author['email'] }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
