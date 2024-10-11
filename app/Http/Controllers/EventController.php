<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\CategoryEvent;
use App\Models\OrganizerEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::query()->where('active', 1)->orderBy('id', 'asc')->get();        
        return view('event/index', compact('events'));
    }

    public function eventList()
    {
        $events = Event::query()->where('active', 1)->orderBy('id', 'asc')->get();        
        return view('event/events', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizers = OrganizerEvent::query()->where('active', 1)->orderBy('id', 'asc')->get();        
        $categories = CategoryEvent::query()->where('active', 1)->orderBy('id', 'asc')->get();        

        return view("event/form", compact('organizers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'required|max:255',
            'venue' => 'required|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'description' => 'required',
            'booking_url' => 'nullable',
            'tags' => 'required',
            'organizer_events_id' => 'required|exists:organizer_events,id',
            'category_events_id' => 'required|exists:category_events,id',
        ]);



        if (!$data) {
            FacadesSession::flash('message', 'gagal di tambahkan !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('event.index');
        }
        // Event::create([
        //     'title' => $request->title,
        //     'venue' => $request->venue,
        //     'date' => Carbon::now()->format('Y-m-d'),
        //     'time' => Carbon::now()->format('H:i:s'),
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
       
        // ]);

        Event::create([
            'title' => $request->title,
            'venue' => $request->venue,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'description' => $request->description,
            'booking_url' => $request->booking_url,
            'tags' => $request->tags,
            'organizer_events_id' => $request->organizer_events_id,
            'category_events_id' => $request->category_events_id,
            'active' => 1,  
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Log::info('Request Data:', $data);



        FacadesSession::flash('message', 'Event berhasil di tambahkan !');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('events.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $event = Event::query()->where('id', $id)->firstOrFail();
        return view("event/show", [
            'event' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::query()->where('id', $id)->firstOrFail();
        $organizers = OrganizerEvent::where('active', 1)->orderBy('id', 'asc')->get();
        $categories = CategoryEvent::where('active', 1)->orderBy('id', 'asc')->get();

        if ($event) {
            $event->tags = explode(',', $event->tags);
        }

        return view('event/form', compact('event', 'organizers', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate([
            'title' => 'required|max:255',
            'venue' => 'required|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'description' => 'required',
            'booking_url' => 'nullable',
            'tags' => 'required',
            'organizer_events_id' => 'required|exists:organizer_events,id',
            'category_events_id' => 'required|exists:category_events,id',
        ]);


          // This will dump the event details and stop the execution

        
        if (!$data) {
            FacadesSession::flash('message', 'gagal diupdate !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('events.index');
        }

        // Event::query()->where('id', $id)->update([
        //     'title' => $request->title,
        //     'venue' => $request->venue,
        //     'date' => $request->date,
        //     'time' => $request->time,
        //     'description' => $request->description,
        //     'booking_url' => $request->venue,
        //     'tags' => $request->tags,
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);

        Event::query()->where('id', $id)->update([
            'title' => $request->title,
            'venue' => $request->venue,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'description' => $request->description,
            'booking_url' => $request->booking_url,
            'tags' => $request->tags,
            'organizer_events_id' => $request->organizer_events_id,
            'category_events_id' => $request->category_events_id,
            'active' => 1,  
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        FacadesSession::flash('message', 'berhasil diupdate !');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Article::find($id)->delete();
        
        Event::query()->where('id', $id)->update([
            'active' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        FacadesSession::flash('message', 'Event berhasil dihapus !');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('events.index');
    }
}
