@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Main Title -->
    <h1 class="text-5xl font-extrabold text-center text-white mb-12">
        Manage Authors
    </h1>

    <!-- Create New Author Button -->
    <div class="flex justify-center mb-8">
        <a href="{{ route('admin.authors.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 shadow-lg">
            + Create New Author
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-500 text-white text-center py-2 mb-6 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Authors Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 rounded-lg shadow-lg text-left text-white">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="px-6 py-3 text-gray-300 uppercase text-sm font-semibold">Name</th>
                    <th class="px-6 py-3 text-gray-300 uppercase text-sm font-semibold">Email</th>
                    <th class="px-6 py-3 text-gray-300 uppercase text-sm font-semibold text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr class="bg-gray-900 hover:bg-gray-700 transition">
                        <td class="px-6 py-4">{{ $author['name'] }}</td>
                        <td class="px-6 py-4">{{ $author['email'] }}</td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('admin.authors.edit', $author['id']) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition mr-2">
                                Edit
                            </a>
                            <form action="{{ route('admin.authors.destroy', $author['id']) }}"
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition"
                                        type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Summary of Total Authors -->
    <div class="mt-6 text-gray-400 text-center">
        <p>Total Authors: {{ count($authors) }}</p>
    </div>
</div>
@endsection
