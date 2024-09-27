@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Main Title -->
    <h1 class="text-5xl font-extrabold text-center text-white mb-12">
        Edit Category
    </h1>

    <!-- Edit Category Form -->
    <div class="flex justify-center">
        <form action="{{ route('admin.categories.update', $category['id']) }}" method="POST" class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-lg">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="block text-gray-300 text-sm font-semibold mb-2">Category Name</label>
                <input type="text" name="name" id="name" value="{{ $category['name'] }}" class="w-full p-3 bg-gray-900 text-white rounded border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-600" required>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 shadow-lg">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
