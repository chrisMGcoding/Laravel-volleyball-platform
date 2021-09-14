@extends('template.template')

@section('content')

    <div class="container">

        <p>ID : {{ ($joueur->id) }}</p>
        <p>nom : {{ ($joueur->nom) }}</p>
        <p>prenom : {{ ($joueur->prenom) }}</p>
        <p>age : {{ ($joueur->age) }}</p>
        <p>telephone : {{ ($joueur->telephone) }}</p>
        <p>email : {{ ($joueur->email) }}</p>
        <p>genre : {{ ($joueur->genre) }}</p>
        <p>origine : {{ ($joueur->origine) }}</p>
        <p>role_id : {{ ($joueur->role_id) }}</p>
        <p>equipe_id : {{ ($joueur->equipe_id) }}</p>

    </div>

@endsection