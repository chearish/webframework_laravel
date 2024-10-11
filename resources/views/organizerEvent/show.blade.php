@extends('base') <!-- Extend layout base jika ada -->

@section('content')
<div class="container mx-auto mt-20 p-4">
    <h1 class="text-center text-3xl font-bold mb-6">{{ $organizer->name }}</h1>
    
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 flex flex-col md:flex-row gap-6">
        <!-- Bagian Gambar -->
    

        <!-- Bagian Detail Acara -->
        <div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">{{ $organizer->name }}</h2>
                <a href="{{ route('organizers.edit', ['organizer' => $organizer->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 rounded text-sm">✏️ Edit</a>
                    <form action="{{ route('organizers.destroy', ['organizer' => $organizer->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded text-sm" onclick="return confirm('Are you sure you want to delete this event?');">🗑️ Delete</button>
                    </form>   
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Facebook</h2>
                <p class="text-gray-600">{{ $organizer->facebook_link }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">X</h2>
                <p class="text-gray-600">{{ $organizer->x_link }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Website</h2>
                <p class="text-gray-600">{{ $organizer->website_link }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Description</h2>
                <p class="text-gray-600">{{ $organizer->description }}</p>
            </div>
        </div>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('organizers.index') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Back</a>
    </div>
</div>

