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

class CategoryEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryEvent::query()->where('active', 1)->orderBy('id', 'asc')->get();        
        return view('category/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //category tu dr nm folder -> form nama filenya (form.blade)
        return view("category/form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|max:255',
        ]);


        if (!$data) {
            FacadesSession::flash('message', 'gagal di tambahkan !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('categories.index');
        }
        // Event::create([
        //     'title' => $request->title,
        //     'venue' => $request->venue,
        //     'date' => Carbon::now()->format('Y-m-d'),
        //     'time' => Carbon::now()->format('H:i:s'),
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
       
        // ]);

        CategoryEvent::create([
            'name' => $request->name,
            'active' => 1,  
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Log::info('Request Data:', $data);



        FacadesSession::flash('message', 'Category berhasil di tambahkan !');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('categories.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $category = CategoryEvent::query()->where('id', $id)->firstOrFail();
        // return view("category/show", [
        //     'category' => $category,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = CategoryEvent::query()->where('id', $id)->firstOrFail();
        return view('category/form', [
            'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
        ]);


          // This will dump the event details and stop the execution

        
        if (!$data) {
            FacadesSession::flash('message', 'gagal diupdate !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('categories.index');
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

        CategoryEvent::query()->where('id', $id)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        FacadesSession::flash('message', 'berhasil diupdate !');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Article::find($id)->delete();
        
        CategoryEvent::query()->where('id', $id)->update([
            'active' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        FacadesSession::flash('message', 'Event berhasil dihapus !');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('categories.index');
    }
}
