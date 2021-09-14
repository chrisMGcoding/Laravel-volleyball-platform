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

        <form action="{{ route('equipe.update', $equipe->id)}}" method="post">
        @csrf
        @method("PUT")

        <div class="mb-3">
            <label class="form-label">Club :</label>
            <input type="text" class="form-control" type="text" name="club" value="{{ $equipe->club }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Ville :</label>
            <input type="text" class="form-control" type="text" name="ville" value="{{ $equipe->ville }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Pays :</label>
            <input class="form-control" name="pays" value="{{ $equipe->pays }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Max Joueur :</label>
            <input type="text" class="form-control" name="max_joueur" value="{{ $equipe->max_joueur }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Max Joueur Rôle :</label>
            <input type="text" class="form-control" name="max_joueur_role" value="{{ $equipe->max_joueur_role }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Continent ID :</label>
            <select name="continent_id" class="form-control" value='{{ $equipe->continent_id }}'>
                @foreach ($continent as $item)
                    <option value="{{ $item->continent }}">{{ $item->continent }}</option>
                @endforeach
            </select>
        </div>


        <button class="mt-2 mb-2" type="submit">Update</button>

        </form>

    </div>

@endsection
