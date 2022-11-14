<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view("admin.settings");
    }

    public function update(Request $request)
    {
        createSettings([
            "maintenance" => $request->has("maintenance"),
            "display.teams" => $request->has("teams"),
            "countdown.display" => $request->has("eventBeginSwitch"),
            "countdown.end" => $request->input("eventBegin") ?? "",
            "stream.status" => $request->has("liveDisplay"),
            "stream.channel" => $request->input("liveChannel"),
            "stream.link" => $request->input("liveLink") ?? "",
            "contact.mail" => $request->input("mailContact") ?? "",
            "home.info" => $request->input('homeInfo'),
        ]);

        return redirect()->route("admin.settings")->with("success", "Paramètres mis à jour !");
    }
}
