@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Page Title -->
    <h2 class="text-4xl font-extrabold text-center text-white mb-8">
        Comments
    </h2>

    <!-- Create New Comment Button -->
    <div class="flex justify-center mb-8">
        <a href="{{ route('admin.comments.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
            + Create New Comment
        </a>
    </div>

    <!-- Comments Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 rounded-lg shadow-lg text-left text-white">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="px-6 py-3 text-gray-300 uppercase text-sm font-semibold">Content</th>
                    <th class="px-6 py-3 text-gray-300 uppercase text-sm font-semibold">Article</th>
                    <th class="px-6 py-3 text-gray-300 uppercase text-sm font-semibold text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                <tr class="bg-gray-900 hover:bg-gray-700 transition">
                    <td class="px-6 py-4">{{ $comment['content'] }}</td>
                    <td class="px-6 py-4">{{ $comment['article']['title'] }}</td>
                    <td class="px-6 py-4 text-center">
                        <!-- Edit Button -->
                        <a href="{{ route('admin.comments.edit', $comment['id']) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition mr-2">
                            Edit
                        </a>

                        <!-- Delete Form -->
                        <form action="{{ route('admin.comments.destroy', $comment['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Summary of Total Comments -->
    <div class="mt-6 text-gray-400 text-center">
        <p>Total Comments: {{ count($comments) }}</p>
    </div>
</div>
@endsection
