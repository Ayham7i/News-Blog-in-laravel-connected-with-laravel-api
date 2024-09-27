@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Main Title -->
    <h1 class="text-5xl font-extrabold text-center text-white mb-12">
        Manage Categories
    </h1>

    <!-- Create New Category Button -->
    <div class="flex justify-center mb-8">
        <a href="{{ route('admin.categories.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 shadow-lg">
            + Create New Category
        </a>
    </div>

    <!-- Categories Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 rounded-lg shadow-lg text-left text-white">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="px-6 py-3 text-gray-300 uppercase text-sm font-semibold">ID</th>
                    <th class="px-6 py-3 text-gray-300 uppercase text-sm font-semibold">Name</th>
                    <th class="px-6 py-3 text-gray-300 uppercase text-sm font-semibold text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr class="bg-gray-900 hover:bg-gray-700 transition duration-300">
                        <td class="px-6 py-4">{{ $category['id'] }}</td>
                        <td class="px-6 py-4">{{ $category['name'] }}</td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('admin.categories.edit', $category['id']) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-full transition duration-300 mr-2">
                                Edit
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category['id']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full transition duration-300" type="submit" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Summary of Total Categories -->
    <div class="mt-6 text-gray-400 text-center">
        <p>Total Categories: {{ count($categories) }}</p>
    </div>
</div>
@endsection
