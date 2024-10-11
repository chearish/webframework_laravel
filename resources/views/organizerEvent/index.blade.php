@extends('base')

@section('library-css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
@endsection

@section('content') 
<div class="p-8 container mx-auto mt-20">
    <div class="flex items-center space-x-4 mb-1">
        <span class="text-3xl font-bold ">Event Organizer</span>
        <a href="{{ route('organizers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+ Create</a>
    </div>

    <div class="p-6 bg-white shadow-lg rounded-lg overflow-x-auto">
    <table class="min-w-full table-auto border-collapse" id="events-table">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Organizer Name</th>
                <th class="border px-4 py-2">About</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($organizers as $organizer)
            <tr>
                <td class="border px-4 py-2">{{$loop->iteration}}</td>
                <td class="border px-4 py-2">
                <a href="{{ route('organizers.show', $organizer->id)}}" class="text-decoration-none text-dark">{{$organizer->name}}</a>
                </td>                
                <td class="border px-4 py-2">{{$organizer->description}}</td>
                <td class="border px-4 py-2 flex space-x-2">
                    <a href="{{ route('organizers.show', ['organizer' => $organizer->id]) }}" class="bg-pink-500 hover:bg-yellow-700 text-white py-1 px-3 rounded text-sm">👁️ View</a>
                    <a href="{{ route('organizers.edit', ['organizer' => $organizer->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 rounded text-sm">✏️ Edit</a>
                    <form action="{{ route('organizers.destroy', ['organizer' => $organizer->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded text-sm" onclick="return confirm('Are you sure you want to delete this event?');">🗑️ Delete</button>
                    </form>                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection


