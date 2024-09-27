@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Main Title -->
    <h1 class="text-5xl font-extrabold text-center text-white mb-12">
        Create New Category
    </h1>

    <!-- Create Category Form -->
    <div class="flex justify-center">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-lg">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-gray-300 text-sm font-semibold mb-2">Category Name</label>
                <input type="text" name="name" id="name" class="w-full p-3 bg-gray-900 text-white rounded border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-600" required>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 shadow-lg">
                    Create
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
