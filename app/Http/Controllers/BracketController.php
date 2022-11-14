<?php

namespace App\Http\Controllers;

use App\Models\Brackets;
use App\Models\Teams;
use Illuminate\Http\Request;

class BracketController extends Controller
{
    public function index()
    {
        return view("admin.brackets.index", [
            "brackets" => Brackets::all(),
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            "game" => "required|integer|min:1|max:5",
            "name" => "required",
        ]);

        Brackets::create([
            "game" => $request->game,
            "name" => $request->name,
            "teams_id" => $request->teams_id,
            "data" => '{"teams":[["Team 1","Team 2"],["",""]],"results":[[[[1,2],[null,null]],[[null,null],[null,null]]]]}'
        ]);

        return redirect()->route("admin.brackets.index")->with('success', "Bracket Crée !");
    }

    public function edit(Brackets $bracket)
    {
        return view("admin.brackets.edit", [
            "bracket" => $bracket,
            "teams" => Teams::all()
        ]);
    }

    public function update(Request $request, Brackets $bracket) {
        $request->validate([
            "game" => "required|integer|min:1|max:5",
            "name" => "required"
        ]);

        if ($request->data == null) {
            $request->data = '{"teams":[["Team 1","Team 2"],["",""]],"results":[[[[1,2],[null,null]],[[null,null],[null,null]]]]}';
        }

        $bracket->update([
            "teams_id" => $request->teams_id,
            "name" => $request->name,
            "data" => $request->data,
            "game" => $request->game
        ]);

        return redirect()->route("admin.brackets.edit", $bracket)->with('success', "Bracket mis à jour !");
    }

    public function destroy(Brackets $bracket) {
        $bracket->delete();
        return redirect()->route("admin.brackets.index")->with('success', "Bracket supprimé !");
    }

    public function home() {
        return view("pages.brackets.index", [
            "lol" => Brackets::where("game" , 1)->get(),
            "valo" =>  Brackets::where("game" , 2)->get(),
            "rl" =>  Brackets::where("game" , 3)->get(),
            "smash" =>  Brackets::where("game" , 4)->get(),
            "baby" =>  Brackets::where("game" , 5)->get(),
        ]);
    }
    
    public function home_show(Brackets $bracket) {
        return view("pages.brackets.show", [
            "bracket" => $bracket
        ]);
    }
   
}
