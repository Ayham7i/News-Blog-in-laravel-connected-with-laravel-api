@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <!-- Main Title -->
        <h1 class="text-5xl font-extrabold text-center text-white mb-12">
            Manage Articles
        </h1>

        <!-- Create New Article Button -->
        <div class="flex justify-center mb-8">
            <a href="{{ route('admin.articles.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 shadow-lg">
                + Create New Article
            </a>
        </div>

        <!-- Articles Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 rounded-lg shadow-lg text-left text-white">
                <thead>
                    <tr class="border-b border-gray-700">
                        <th class="px-6 py-3 text-gray-300 uppercase text-sm font-semibold">Title</th>
                        <th class="px-6 py-3 text-gray-300 uppercase text-sm font-semibold">Author</th>
                        <th class="px-6 py-3 text-gray-300 uppercase text-sm font-semibold">Category</th>
                        <th class="px-6 py-3 text-gray-300 uppercase text-sm font-semibold">Content</th>
                        <th class="px-6 py-3 text-gray-300 uppercase text-sm font-semibold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr class="bg-gray-900 hover:bg-gray-700 transition duration-300">
                            <td class="px-6 py-4">{{ $article['title'] }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $author = collect($authors)->firstWhere('id', $article['author_id']);
                                    echo $author ? $author['name'] : 'Unknown';
                                @endphp
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $category = collect($categories)->firstWhere('id', $article['category_id']);
                                    echo $category ? $category['name'] : 'Unknown';
                                @endphp
                            </td>
                            <td class="px-6 py-4">{{ Str::limit($article['content'], 50) }}</td> <!-- Limit content to 50 characters -->
                            <td class="px-6 py-4 text-center">
                                <!-- Flexbox container for buttons -->
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.articles.edit', $article['id']) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full transition duration-300">Edit</a>
                                    <form action="{{ route('admin.articles.destroy', $article['id']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full transition duration-300" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Summary of Total Articles -->
        <div class="mt-6 text-gray-400 text-center">
            <p>Total Articles: {{ count($articles) }}</p>
        </div>
    </div>
@endsection
