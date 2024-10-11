<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use App\Models\CategoryEvent;
use App\Models\Event;
use App\Models\OrganizerEvent;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class OrganizerEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizer = OrganizerEvent::query()->where('active', 1)->orderBy('id', 'desc')->get();
        return view("organizerEvent/index", [
            'organizers' => $organizer,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("organizerEvent/form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required|max:255',
            'facebook_link' => 'required',
            'x_link' => 'required',
            'website_link' => 'required',
            
            
        ]);

        if (!$data) {
            FacadesSession::flash('message', 'gagal di tambahkan !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('organizers.index');
        }
        
        OrganizerEvent::create([
            'name' => $request->name,
            'description' => $request->description,
            'facebook_link' => $request->facebook_link,
            'x_link' => $request->x_link,
            'website_link' => $request->website_link,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // OrganizerEvent::create(attributes: $request->all());


        FacadesSession::flash('message', 'Organizer berhasil di tambahkan !');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('organizers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $organizer = OrganizerEvent::query()->where('id', $id)->firstOrFail();
        return view("organizerEvent/show", [
            'organizer' => $organizer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $organizer = OrganizerEvent::query()->where('id', $id)->firstOrFail();
        return view("organizerEvent/form", ['organizer' => $organizer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required|max:255',
            'facebook_link' => 'required',
            'x_link' => 'required',
            'website_link' => 'required',
            ]);

        if (!$data) {
            FacadesSession::flash('message', 'gagal diupdate !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('organizers.index');
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

        OrganizerEvent::query()->where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'facebook_link' => $request->facebook_link,
            'x_link' => $request->x_link,
            'website_link' => $request->website_link,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
       
        ]);
        FacadesSession::flash('message', 'Organizer berhasil diupdate !');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('organizers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Article::find($id)->delete();
        
        OrganizerEvent::query()->where('id', $id)->update([
            'active' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        FacadesSession::flash('message', 'Organizer berhasil dihapus !');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('organizers.index');
    }
}
