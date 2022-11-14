<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use App\Models\User;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            return view("admin.teams.index", [
                "teams" => Teams::where("name", "LIKE", '%' . $request->search . '%')
                ->orWhere("id", "LIKE", '%' . $request->search . '%')
                ->paginate(10),
                "search" => $request->search
            ]);
        }

        return view("admin.teams.index", [
            "teams" => Teams::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.teams.create", [
            "users" => User::all(),
        ]);
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
            "name" => "string|required",
            "prefix" => "nullable|string",
            "game" => 'integer|min:1|max:5|required',
            "badge" => "nullable|string",
        ]);

        Teams::create([
            'name' => $request->name,
            'prefix' => $request->prefix ?? "",
            "game" => $request->game,
            "badge" => $request->badge ?? "",
            "mates" => $request->mates,
            "active" => $request->has("active")
        ]);

        return redirect()->route('admin.teams.index')->with("success", "Equipe crée !");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teams  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Teams $team)
    {
        return view("admin.teams.edit", [
            "team" => $team,
            "users" => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teams  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teams $team)
    {
        $request->validate([
            "name" => "string|required",
            "prefix" => "nullable|string",
            "game" => 'integer|min:1|max:5|required',
            "badge" => "nullable|string",
        ]);

        $team->update([
            'name' => $request->name,
            'prefix' => $request->prefix ?? "",
            "game" => $request->game,
            "badge" => $request->badge ?? "",
            "mates" => $request->mates,
            "active" => $request->has("active")
        ]);

        return redirect()->route('admin.teams.index')->with("success", "Equipe modifié !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teams  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teams $team)
    {
        $team->delete();
        return redirect()->route('admin.teams.index')->with("success", "Equipe supprimé !");
    }


    public function home()
    {
        return view("pages.teams.index" , [
            "lol" => Teams::where('game', 1)->where("active", true)->get(),
            "valo" => Teams::where('game', 2)->where("active", true)->get(),
            "rl" => Teams::where('game', 3)->where("active", true)->get(),
            "smash" => Teams::where('game', 4)->where("active", true)->get(),
            "baby" => Teams::where('game', 5)->where("active", true)->get(),
        ]);
    }

    public function home_show(Teams $team)
    {   
        return view("pages.teams.show", [
            "team" => $team
        ]);
    }
}
