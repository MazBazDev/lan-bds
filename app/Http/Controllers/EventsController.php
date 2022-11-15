<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.planning.index", [
            "events" => Events::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.planning.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required", "string"],
            "content" => ["required", "string"],
            "start" => ["required", "date_format:H:i"],
            "end" => ["required", "date_format:H:i"],
            "active" => ['nullable'],
            "day" => ["required", "integer","min:1","max:3"],
            "color" => ["required", "integer","min:1","max:7"],
        ]);

        Events::create([
            "title" => $request->title,
            "content" => $request->content,
            "start" => strtotime($request->start),
            "end" => strtotime($request->end),
            "active" => $request->has("active"),
            "day" => $request->day,
            "color" => $request->color
        ]);

        return redirect()->route("admin.events.index")->with("success", "Evenement crée !");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Events  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Events $event)
    {
        return view("admin.planning.edit", [
            "event" => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Events  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Events $event)
    {
        $request->validate([
            "title" => ["required", "string"],
            "content" => ["required", "string"],
            "start" => ["required", "date_format:H:i"],
            "end" => ["required", "date_format:H:i"],
            "active" => ['nullable'],
            "day" => ["required", "integer","min:1","max:3"],
            "color" => ["required", "integer","min:1","max:7"],
        ]);

        $event->update([
            "title" => $request->title,
            "content" => $request->content,
            "start" => strtotime($request->start),
            "end" => strtotime($request->end),
            "active" => $request->has("active"),
            "day" => $request->day,
            "color" => $request->color
        ]);

        return redirect()->route("admin.events.index")->with("success", "Evenement mis à jour !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $event)
    {
        $event->delete();

        return redirect()->route("admin.events.index")->with("success", "Evenement supprimé !");        
    }

    /**
     * Get Event content
     *
     * @param  \App\Models\Events  $event
     * @return \Illuminate\Http\Response
     */
    public function api(Events $event)
    {
        return "</div class='container'>".$event->content."</div>";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view("pages.planning", [
            "vendredi" => Events::where("day", 1)->where('active', true)->get(),
            "samedi" => Events::where("day", 2)->where('active', true)->get(),
            "dimanche" => Events::where("day", 3)->where('active', true)->get(),
        ]);
    }
}
