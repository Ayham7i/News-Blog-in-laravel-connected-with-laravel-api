@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-white mb-8">Create Article</h1>

    <form action="{{ route('admin.articles.store') }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-lg text-white max-w-2xl mx-auto">
        @csrf
        <!-- Title Field -->
        <div class="mb-6">
            <label for="title" class="block text-gray-300 font-semibold mb-2">Title</label>
            <input type="text" name="title" id="title" class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-white" required>
        </div>

        <!-- Content Field -->
        <div class="mb-6">
            <label for="content" class="block text-gray-300 font-semibold mb-2">Content</label>
            <textarea name="content" id="content" rows="5" class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-white" required></textarea>
        </div>

        <!-- Author Field -->
        <div class="mb-6">
            <label for="author_id" class="block text-gray-300 font-semibold mb-2">Author</label>
            <select name="author_id" id="author_id" class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-white" required>
                @foreach($authors as $author)
                    <option value="{{ $author['id'] }}">{{ $author['name'] }}</option>
                @endforeach
            </select>
        </div>

        <!-- Category Field -->
        <div class="mb-6">
            <label for="category_id" class="block text-gray-300 font-semibold mb-2">Category</label>
            <select name="category_id" id="category_id" class="w-full px-4 py-2 rounded-lg bg-gray-900 border border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-white" required>
                @foreach($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition">
                Create
            </button>
        </div>
    </form>
</div>
@endsection
