@extends('base')

@section('library-js')
<script type="text/javascript" src="//cdn.datatables.net/2.1.8/js/dataTables.min.js" />
@endsection

@section('library-js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/2.1.8/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#events-table').DataTable();
    });
</script>
@endsection

@section('content') 
<div class="p-8 container mx-auto mt-20">
    <div class="flex items-center space-x-4 mb-1">
        <span class="text-3xl font-bold ">Events</span>
        <a href="{{ route('events.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+ Create</a>
    </div>

    <div class="p-6 bg-white shadow-lg rounded-lg overflow-x-auto">
    <table class="min-w-full table-auto border-collapse" id="events-table">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Event Name</th>
                <th class="border px-4 py-2">Date</th>
                <th class="border px-4 py-2">Venue</th>
                <th class="border px-4 py-2">Organizer</th>
                <th class="border px-4 py-2">About</th>
                <th class="border px-4 py-2">Tags</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2">{{ $event->title }}</td>
                <td class="border px-4 py-2">{{ $event->date }} {{ \Carbon\Carbon::parse($event->start_time)->format('g:i A') }}</td>
                <td class="border px-4 py-2">{{ $event->venue }}</td>
                <td class="border px-4 py-2">{{ $event->organizer_events->name }}</td> 
                <td class="border px-4 py-2">{{ Str::limit( $event->description,100) }}</td>                    
                <td class="border px-4 py-2">
                    @foreach(explode(',', $event->tags) as $tag)
                        <span class="bg-blue-200 text-blue-800 py-0.5 px-1 rounded-full text-xs">{{ trim($tag) }}</span>
                    @endforeach                    
                </td>
                <td class="border px-4 py-2 flex space-x-2">
                    <a href="{{ route('events.edit', ['event' => $event->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 rounded text-sm">✏️ Edit</a>
                    <form action="{{ route('events.destroy', ['event' => $event->id]) }}" method="POST" style="display: inline;">
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


@section('library-js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/2.1.8/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#events-table').DataTable();
    });
</script>
@endsection