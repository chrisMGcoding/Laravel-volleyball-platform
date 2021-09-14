@extends('template.template')

@section('content')

    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('joueur.update', $joueur->id)}}" method="post">
        @csrf
        @method("PUT")

        <div class="mb-3">
            <label class="form-label">nom :</label>
            <input type="text" class="form-control" type="text" name="nom" value="{{ $joueur->nom }}">
        </div>
        <div class="mb-3">
            <label class="form-label">prenom :</label>
            <input type="text" class="form-control" type="text" name="prenom" value="{{ $joueur->prenom }}">
        </div>
        <div class="mb-3">
            <label class="form-label">age :</label>
            <input class="form-control" name="age" value="{{ $joueur->age }}">
        </div>
        <div class="mb-3">
            <label class="form-label">telephone :</label>
            <input type="text" class="form-control" name="telephone" value="{{ $joueur->telephone }}">
        </div>
        <div class="mb-3">
            <label class="form-label">email :</label>
            <input type="text" class="form-control" name="email" value="{{ $joueur->email }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Genre :</label>
            <input type="text" class="form-control" name="genre" value="{{ $joueur->genre }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Origine :</label>
            <input type="text" class="form-control" name="origine" value="{{ $joueur->origine }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Role ID :</label>
            <select name="role_id" class="form-control" value='{{ $joueur->role_id }}'>
                @foreach ($role as $item)
                    <option value="{{ $item->id }}">{{ $item->position }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">equipe ID :</label>
            <select name="equipe_id" class="form-control">
                @foreach ($equipe as $item)
                    <option value="{{ $item->id }}">{{ $item->club }}</option>
                @endforeach
                <option value="">pas d'équipe</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Photo de Profil</label>
            <input class="form-control" type="file" name="url">
        </div>


        <button class="mt-2 mb-2" type="submit">Update</button>

        </form>

    </div>

@endsection
