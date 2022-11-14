<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function home_show(Request $request)
    {
        return view("pages.profil.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function home_update(Request $request, User $user)
    {
        abort_if($request->user() != $user, 401);

        if ($request->input("name") != null) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);

            $user->name = $request->name;
        }

        if ($request->input("pseudo") != null) {
            $request->validate([
                'pseudo' => ['required', 'string', 'max:255', 'unique:users'],
            ]);

            $user->pseudo = $request->pseudo;
        }

        if ($request->input("email") != null) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);

            $user->email = $request->email;
        }

        if ($request->picture != null) {
            $request->validate([
                "picture" => 'bail|required|image',
            ]);
            
            if ($user->picture !== null) {
                Storage::delete($user->picture);
            }

            $user->picture = $request->picture->store("profil");
        }

        $user->save();

        return redirect()->route("profil")->with("success", "Profil mis à jour !");
    }

    public function index(Request $request)
    {
        if ($request->search) {
            return view("admin.users.index", [
                "users" => User::where("name", "LIKE", '%' . $request->search . '%')
                ->orWhere("id", "LIKE", '%' . $request->search . '%')
                ->orWhere("pseudo", "LIKE", '%' . $request->search . '%')
                ->orWhere("email", "LIKE", '%' . $request->search . '%')
                ->paginate(10),
                "search" => $request->search
            ]);
        }

        return view("admin.users.index", [
            "users" => User::paginate(10)
        ]);
    }

    public function edit(Request $request, User $user)
    {
        if($request->user()->id == $user->id) {
            return redirect()->route("profil");
        }

        return view('admin.users.edit', [
            "user" => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        if ($request->input("name") != null) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);

            $user->name = $request->name;
        }

        if ($request->input("pseudo") != null) {
            $request->validate([
                'pseudo' => ['required', 'string', 'max:255', 'unique:users'],
            ]);

            $user->pseudo = $request->pseudo;
        }

        if ($request->input("email") != null) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);

            $user->email = $request->email;
        }

        if ($request->picture != null) {
            $request->validate([
                "picture" => 'bail|required|image',
            ]);
            
            if ($user->picture !== null) {
                Storage::delete($user->picture);
            }

            $user->picture = $request->picture->store("profil");
        }
       
        if($request->has("role") && $request->user()->admin && $request->user()->id != $user->id) {
            $request->validate([
                "picture" => 'integer|min:1|max:3',
            ]);

            switch ($request->input("role")) {
                case 1:
                    $user->admin = false;
                    $user->modo = false;
                    break;
                case 2:
                    $user->admin = false;
                    $user->modo = true;
                    break;
                case 3:
                    $user->admin = true;
                    $user->modo = false;
                    break;
            }
        }

        $user->save();

        return redirect()->route("admin.users.index")->with("success", "Profil mis à jour !");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route("admin.users.index")->with('success', "Utilisateur supprimé !");
    }
}
