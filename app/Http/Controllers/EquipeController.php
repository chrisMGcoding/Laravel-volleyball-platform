<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Role;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipe = Equipe::all();
        return view('pages.equipe', compact('equipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $continent = Continent::all();
        return view('EquipeCrud.create', compact('continent'));
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
            'club' => ['required'],
            'ville' => ['required'],
            'pays' => ['required'],
            'max_joueur' => ['required'],
            'max_joueur_role' => ['required'],
            'continent_id' => ['required']
        ]);

        $table = new Equipe;

        $table -> club = $request -> club;
        $table -> ville = $request -> ville;
        $table -> pays = $request -> pays;
        $table -> max_joueur = $request -> max_joueur;
        $table -> max_joueur_role = $request -> max_joueur_role;
        $table -> continent_id = $request -> continent_id;

        $table -> save();

        return redirect() -> route('equipe.index') -> with('message', 'Equipe ajoutée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Equipe $equipe)
    {
        return view('EquipeCrud.show', compact('equipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipe $equipe)
    {
        return view('EquipeCrud.edit', compact('equipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipe $equipe)
    {
        $request -> validate([
            'club' => ['required'],
            'ville' => ['required'],
            'pays' => ['required'],
            'max_joueur' => ['required'],
            'max_joueur_role' => ['required'],
            'continent_id' => ['required']
        ]);

        $equipe -> club = $request -> club;
        $equipe -> ville = $request -> ville;
        $equipe -> pays = $request -> pays;
        $equipe -> max_joueur = $request -> max_joueur;
        $equipe -> max_joueur_role = $request -> max_joueur_role;
        $equipe -> continent_id = $request -> continent_id;

        $equipe -> save();

        return redirect() -> route('equipe.index') -> with('message', 'Equipe modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipe $equipe)
    {
        $equipe -> delete();

        return redirect() -> route('equipe.index') -> with('message', 'Equipe supprimée');
    }
}
