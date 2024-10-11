@extends('base') <!-- Extend layout base jika ada -->

@section('content')
<div class="container mx-auto mt-20 p-4">
    <h1 class="text-center text-3xl font-bold mb-6">{{ $event->title }}</h1>
    
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 flex flex-col md:flex-row gap-6">
        <!-- Bagian Gambar -->
        <div class="flex-shrink-0">
            <img src="{{ asset('images/petracantare.png') }}" alt="{{ $event->title }}" class="w-full md:w-64 h-64 object-cover rounded-lg">
        </div>

        <!-- Bagian Detail Acara -->
        <div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Date & Time</h2>
                <p class="text-gray-600">{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }} at {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Venue</h2>
                <p class="text-gray-600">{{ $event->venue }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Organizer</h2>
                <p class="text-gray-600">{{ $event->organizer_events->name }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Category</h2>
                <p class="text-gray-600">{{ $event->category_events->name }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Description</h2>
                <p class="text-gray-600">{{ $event->description }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Booking URL</h2>
                <a href="{{ $event->booking_url }}" class="text-blue-500 hover:underline">{{ $event->booking_url }}</a>
            </div>
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Tags</h2>
                <div>
                    @foreach(explode(',', $event->tags) as $tag)
                        <span class="inline-block bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-medium mr-1 mb-1">{{ trim($tag) }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('event.list') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Back</a>
    </div>
</div>

@endsection