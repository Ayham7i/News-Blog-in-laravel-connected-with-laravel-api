@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Category</h2>
    <form action="{{ route('admin.categories.update', $category['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $category['name'] }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
