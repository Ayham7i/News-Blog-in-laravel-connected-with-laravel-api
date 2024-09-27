@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Page Title -->
    <h2 class="text-4xl font-extrabold text-center text-white mb-8">
        Create New Comment
    </h2>

    <!-- Form to Create New Comment -->
    <form action="{{ route('admin.comments.store') }}" method="POST" class="bg-gray-800 p-8 rounded-lg shadow-lg">
        @csrf

        <!-- Comment Content Field -->
        <div class="mb-6">
            <label for="content" class="block text-gray-300 text-lg font-semibold mb-2">Comment Content</label>
            <textarea name="content" id="content" rows="4" class="w-full px-4 py-2 bg-gray-900 text-white rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" required></textarea>
        </div>

        <!-- Select Article Dropdown -->
        <div class="mb-6">
            <label for="article_id" class="block text-gray-300 text-lg font-semibold mb-2">Select Article</label>
            <select name="article_id" id="article_id" class="w-full px-4 py-2 bg-gray-900 text-white rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                @foreach($articles as $article)
                <option value="{{ $article['id'] }}">{{ $article['title'] }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-full transition">
                Create
            </button>
        </div>
    </form>
</div>
@endsection
