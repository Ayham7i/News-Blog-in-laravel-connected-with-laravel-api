@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Main Title -->
    <h1 class="text-4xl font-extrabold text-center text-white mb-12">
        Edit Author
    </h1>

    <!-- Edit Author Form -->
    <div class="max-w-lg mx-auto bg-gray-800 p-6 rounded-lg shadow-lg">
        <form action="{{ route('admin.authors.update', $author['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name Input -->
            <div class="mb-6">
                <label for="name" class="block text-gray-300 font-bold mb-2">Name</label>
                <input type="text" name="name" value="{{ $author['name'] }}" class="w-full bg-gray-900 text-white border border-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('name')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Input -->
            <div class="mb-6">
                <label for="email" class="block text-gray-300 font-bold mb-2">Email</label>
                <input type="email" name="email" value="{{ $author['email'] }}" class="w-full bg-gray-900 text-white border border-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('email')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full transition duration-300 shadow-lg">
                    Update Author
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
