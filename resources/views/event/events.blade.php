@extends('base')

@section('content')
<div class="p-8 container mx-auto ">
    <div class="col">
        <h3 class="text-3xl font-bold">Events in Surabaya</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 mt-4" style="grid-auto-rows: 1fr;">
        @foreach($events as $event)
            <div class="mb-6">
                <a href="{{ route('events.show', $event->id) }}" class="block text-decoration-none text-dark">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden h-full">
                        <img src="{{ asset('images/petracantare.png') }}" alt="Event Image" class="w-full">
                        <div class="p-4">
                            <h5 class="text-xl font-semibold">{{ $event->title }}</h5>
                            <p class="text-gray-700 mt-2">
                                <strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('l, M d Y') }}<br>
                                <strong>Time:</strong> {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }}<br>
                                <strong>Venue:</strong> {{ $event->venue }}<br>
                                <strong>Organizer:</strong> {{ $event->organizer_events->name ?? 'N/A' }}<br>
                                <strong>Tags:</strong> {{ $event->tags }}<br>
                                <strong>Booking URL:</strong> <a href="{{ $event->booking_url }}" class="text-blue-600 underline">{{ $event->booking_url }}</a>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    </div>
</div>

@endsection