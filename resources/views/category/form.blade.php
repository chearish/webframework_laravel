@extends('base')

@section('content')
<div class="p-8 container mx-auto">
    <div class="max-w-xl mx-auto py-20">
        <h1 class="text-3xl font-extrabold mb-3">{{ isset($category) ? "Edit" : "Add" }} Category</h1>
        <form action="{{ isset($category) ? route('categories.update', ['category' => $category->id]) : route('categories.store') }}" method="POST">
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                @if($errors->has('name'))
                    <div class="text-red-500">{{ $errors->first('name') }}</div>
                @endif
                <input type="text" id="name" name="name"
                    value="{{ isset($category) ? $category->name : "" }}"
                    class="mt-1 block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
            </div>

            <div class="flex justify-between mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                <a href="{{ route('categories.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

