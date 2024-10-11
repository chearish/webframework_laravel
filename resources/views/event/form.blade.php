@extends('base')

@section('content')
<div class="p-8 container mx-auto">
    <div class="max-w-xl mx-auto py-24">
        <h1 class="text-3xl font-extrabold mb-3">{{ isset($event) ? "Edit" : "Add" }} Event</h1>
        <form action="{{ isset($event) ? route('events.update', ['event' => $event->id]) : route('events.store') }}" method="POST">
            @csrf
            @if(isset($event))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Name</label>
                @if($errors->has('title'))
                    <div class="text-red-500">{{ $errors->first('title') }}</div>
                @endif
                <input type="text" id="title" name="title"
                    value="{{ isset($event) ? $event->title : "" }}"
                    class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
            </div>

            <div class="mb-4">
                <label for="venue" class="block text-sm font-medium text-gray-700">Venue</label>
                @if($errors->has('venue'))
                    <div class="text-red-500">{{ $errors->first('venue') }}</div>
                @endif
                <input type="text" id="venue" name="venue"
                    value="{{ isset($event) ? $event->venue : "" }}"
                    class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
            </div>

            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                @if($errors->has('date'))
                    <div class="text-red-500">{{ $errors->first('date') }}</div>
                @endif
                <input type="date" id="date" name="date"
                    value="{{ isset($event) ? $event->date : "" }}"
                    class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
            </div>

            <div class="mb-4">
                <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                @if($errors->has('start_time'))
                    <div class="text-red-500">{{ $errors->first('start_time') }}</div>
                @endif
                <input type="time" id="start_time" name="start_time"
                    value="{{ isset($event) ? $event->start_time : "" }}"
                    class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">About</label>
                @if($errors->has('description'))
                    <div class="text-red-500">{{ $errors->first('description') }}</div>
                @endif
                <textarea class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" id="description" name="description" rows="3">{{ isset($event) ? $event->description : "" }}</textarea>
            </div>

            <div class="mb-4">
                <label for="booking_url" class="block text-sm font-medium text-gray-700">Booking URL</label>
                @if($errors->has('booking_url'))
                    <div class="text-red-500">{{ $errors->first('booking_url') }}</div>
                @endif
                <input type="text" id="booking_url" name="booking_url"
                    value="{{ isset($event) ? $event->booking_url : "" }}"
                    class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
            </div>

            <div class="mb-4">
                <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                @if($errors->has('tags'))
                    <div class="text-red-500">{{ $errors->first('tags') }}</div>
                @endif
                <input type="text" id="tags" name="tags"
                    value="{{ isset($event) ? $event->tags : "" }}"
                    class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
            </div>

            <div class="mb-4">
                @if($errors->has('organizer_events_id'))
                    <div class="text-red-500">{{ $errors->first('organizer_events_id') }}</div>
                @endif
                <label for="organizer_events_id" class="block text-sm font-medium text-gray-700">Choose Organizer</label>
                <select class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" id="organizer_events_id" name="organizer_events_id" required>
                    <option selected disabled>Choose Organizer</option>
                    @foreach($organizers as $organizer)
                        <option value="{{ $organizer->id }}" {{ isset($event) && $event->organizer_events_id == $organizer->id ? 'selected' : '' }}>
                            {{ $organizer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                @if($errors->has('category_events_id'))
                    <div class="text-red-500">{{ $errors->first('category_events_id') }}</div>
                @endif
                <label for="category_events_id" class="block text-sm font-medium text-gray-700">Choose Category</label>
                <select class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" id="category_events_id" name="category_events_id" required>
                    <option selected disabled>Choose Category</option>
                    @foreach($categories as $categories)
                        <option value="{{ $categories->id }}" {{ isset($event) && $event->category_events_id == $categories->id ? 'selected' : '' }}>
                            {{ $categories->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                <a href="{{ route('events.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

