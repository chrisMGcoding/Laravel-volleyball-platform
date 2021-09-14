<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Photo;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joueur = Joueur::all();
        $equipe = Equipe::all();
        return view('pages.joueur', compact('joueur', 'equipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        $equipe = Equipe::all();
        return view('JoueurCrud.create', compact('role', 'equipe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nom' => ['required'],
            'prenom' => ['required'],
            'age' => ['required'],
            'telephone' => ['required'],
            'email' => ['required'],
            'genre' => ['required'],
            'origine' => ['required'],
            'role_id' => ['required'],
        ]);

        $table = new Joueur;

        $table -> nom = $request -> nom;
        $table -> prenom = $request -> prenom;
        $table -> age = $request -> age;
        $table -> telephone = $request -> telephone;
        $table -> email = $request -> email;
        $table -> genre = $request -> genre;
        $table -> origine = $request -> origine;
        $table -> role_id = $request -> role_id;
        $table -> equipe_id = $request -> equipe_id;

        $table -> save();

        $photo = new Photo;

        $photo -> url = $request -> file("url") -> hashName();
        $photo -> joueur_id = $table -> id;

        $photo -> save();

        $request -> file("url") -> storePublicly("image", "public");

        return redirect() -> route('joueur.index') -> with('message', 'Joueur ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function show(Joueur $joueur)
    {
        return view('JoueurCrud.show', compact('joueur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function edit(Joueur $joueur)
    {
        $photo = Photo::all();
        $role = Role::all();
        $equipe = Equipe::all();
        return view('JoueurCrud.edit', compact('joueur', 'role', 'equipe', 'photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Joueur $joueur, Photo $photo)
    {
        $request -> validate([
            'nom' => ['required'],
            'prenom' => ['required'],
            'age' => ['required'],
            'telephone' => ['required'],
            'email' => ['required'],
            'genre' => ['required'],
            'origine' => ['required'],
            'role_id' => ['required'],
        ]);

        $joueur -> nom = $request -> nom;
        $joueur -> prenom = $request -> prenom;
        $joueur -> age = $request -> age;
        $joueur -> telephone = $request -> telephone;
        $joueur -> email = $request -> email;
        $joueur -> genre = $request -> genre;
        $joueur -> origine = $request -> origine;
        $joueur -> role_id = $request -> role_id;
        $joueur -> equipe_id = $request -> equipe_id;


        Storage::disk("public") -> delete("image/" . $photo->url);

        $photo -> url = $request -> file("url") -> hashName();

        $joueur -> save();
        $photo -> save();

        $request -> file("url") -> storePublicly("image", "public");

        return redirect() -> route('joueur.index') -> with('message', 'Joueur modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joueur $joueur, Photo $photo)
    {
        Storage::disk('public') -> delete('image/' . $photo->url);

        $joueur -> delete();

        return redirect() -> route('joueur.index') -> with('message', 'Joueur supprimé !');
    }
}
