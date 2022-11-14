<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RulesController extends Controller
{
    public function index()
    {
        return view("admin.rules.index");
    }

    public function general(Request $request)
    {
        createSettings([
            'rules.general' => $request->general
        ]);

        return redirect()->route('admin.rules')->with("success", "Mis à jour !");
    }

    public function baby(Request $request)
    {
        createSettings([
            'rules.baby' => $request->baby
        ]);
        return redirect()->route('admin.rules')->with("success", "Mis à jour !");
    }

    public function lg(Request $request)
    {
        createSettings([
            'rules.lg' => $request->lg
        ]);

        return redirect()->route('admin.rules')->with("success", "Mis à jour !");
            
    }

    public function lol(Request $request)
    {
        createSettings([
            'rules.lol' => $request->lol
        ]);
        return redirect()->route('admin.rules')->with("success", "Mis à jour !");
            
    }

    public function valo(Request $request)
    {
        createSettings([
            'rules.valo' => $request->valo
        ]);
        return redirect()->route('admin.rules')->with("success", "Mis à jour !");

    }

    public function rl(Request $request)
    {
        createSettings([
            'rules.rl' => $request->rl
        ]);
        return redirect()->route('admin.rules')->with("success", "Mis à jour !");

    }

    public function smash(Request $request)
    {
        createSettings([
            'rules.smash' => $request->smash
        ]);
        return redirect()->route('admin.rules')->with("success", "Mis à jour !");
    }
}
