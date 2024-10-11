@extends('base')

@section('content')
<div class="p-8 container mx-auto">
    <div class="max-w-xl mx-auto py-20">
        <h1 class="text-3xl font-extrabold mb-3">{{ isset($organizer) ? "Edit" : "Add" }} Organizer</h1>
        <form action="{{ isset($organizer) ? route('organizers.update', ['organizer' => $organizer->id]) : route('organizers.store') }}" method="POST">
            @csrf
            @if(isset($organizer))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                @if($errors->has('name'))
                    <div class="text-red-500">{{ $errors->first('name') }}</div>
                @endif
                <input type="text" id="name" name="name"
                    value="{{ isset($organizer) ? $organizer->name : "" }}"
                    class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">About</label>
                @if($errors->has('description'))
                    <div class="text-red-500">{{ $errors->first('description') }}</div>
                @endif
                <textarea class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" id="description" name="description" rows="3">{{ isset($organizer) ? $organizer->description : "" }}</textarea>
            </div>

            <div class="mb-4">
                <label for="facebook_link" class="block text-sm font-medium text-gray-700">Facebook Link</label>
                @if($errors->has('facebook_link'))
                    <div class="text-red-500">{{ $errors->first('facebook_link') }}</div>
                @endif
                <input type="text" id="facebook_link" name="facebook_link"
                    value="{{ isset($organizer) ? $organizer->facebook_link : "" }}"
                    class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
            </div>


            <div class="mb-4">
                <label for="x_link" class="block text-sm font-medium text-gray-700">X Link</label>
                @if($errors->has('x_link'))
                    <div class="text-red-500">{{ $errors->first('x_link') }}</div>
                @endif
                <input type="text" id="x_link" name="x_link"
                    value="{{ isset($organizer) ? $organizer->x_link : "" }}"
                    class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
            </div>

            <div class="mb-4">
                <label for="website_link" class="website_link">Website Link</label>
                @if($errors->has('website_link'))
                    <div class="text-red-500">{{ $errors->first('website_link') }}</div>
                @endif
                <input type="text" id="website_link" name="website_link"
                    value="{{ isset($organizer) ? $organizer->website_link : "" }}"
                    class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
            </div>

            <div class="flex justify-between mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                <a href="{{ route('organizers.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
