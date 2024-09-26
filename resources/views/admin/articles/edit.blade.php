@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center text-white mb-8">Edit Article</h1>

        <form action="{{ route('admin.articles.update', $article['id']) }}" method="POST" class="max-w-2xl mx-auto bg-gray-800 p-8 rounded-lg shadow-lg">
            @csrf
            @method('PUT')

            <!-- Title Field -->
            <div class="mb-6">
                <label for="title" class="block text-gray-300 text-sm font-bold mb-2">Title</label>
                <input type="text" name="title" class="w-full px-4 py-2 rounded-lg bg-gray-900 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ $article['title'] }}" required>
            </div>

            <!-- Content Field -->
            <div class="mb-6">
                <label for="content" class="block text-gray-300 text-sm font-bold mb-2">Content</label>
                <textarea name="content" rows="5" class="w-full px-4 py-2 rounded-lg bg-gray-900 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-600" required>{{ $article['content'] }}</textarea>
            </div>

            <!-- Author Selection -->
            <div class="mb-6">
                <label for="author_id" class="block text-gray-300 text-sm font-bold mb-2">Author</label>
                <select name="author_id" class="w-full px-4 py-2 rounded-lg bg-gray-900 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    @foreach($authors as $author)
                        <option value="{{ $author['id'] }}" {{ $article['author_id'] == $author['id'] ? 'selected' : '' }}>
                            {{ $author['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Category Selection -->
            <div class="mb-6">
                <label for="category_id" class="block text-gray-300 text-sm font-bold mb-2">Category</label>
                <select name="category_id" class="w-full px-4 py-2 rounded-lg bg-gray-900 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    @foreach($categories as $category)
                        <option value="{{ $category['id'] }}" {{ $article['category_id'] == $category['id'] ? 'selected' : '' }}>
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Update Button -->
            <div class="flex justify-center">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg transition">
                    Update Article
                </button>
            </div>
        </form>
    </div>
@endsection
