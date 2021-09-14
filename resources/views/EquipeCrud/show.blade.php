@extends('template.template')

@section('content')

    <div class="container">

        <p>ID : {{ ($equipe->id) }}</p>
        <p>club : {{ ($equipe->club) }}</p>
        <p>ville : {{ ($equipe->prenom) }}</p>
        <p>max joueur : {{ ($equipe->max_joueur) }}</p>
        <p>max joueur rôle : {{ ($equipe->max_joueur_role) }}</p>
        <p>continent ID : {{ ($equipe->continent_id) }}</p>

    </div>

@endsection