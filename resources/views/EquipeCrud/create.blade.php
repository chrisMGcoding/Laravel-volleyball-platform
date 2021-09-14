@extends('template.template')

@section('content')

<div class="container">

    <h1 class="text-center my-3">Créer Equipe</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('equipe.store') }}" method="post">
    @csrf
    
        <div class="mb-3">
            <label class="form-label">Club :</label>
            <input type="text" class="form-control" type="text" name="club" value="{{ old('club') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Ville :</label>
            <input type="text" class="form-control" type="text" name="ville" value="{{ old('ville') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Pays :</label>
            <input class="form-control" name="pays" value="{{ old('pays') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Max Joueur :</label>
            <input type="text" class="form-control" name="max_joueur" value="{{ old('max_joueur') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Max Joueur Rôle :</label>
            <input type="text" class="form-control" name="max_joueur_role" value="{{ old('max_joueur_role') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Continent ID :</label>
            <select name="continent_id" class="form-control" value='{{ old('continent_id') }}'>
                @foreach ($continent as $item)
                    <option value="{{ $item->id }}">{{ $item->continent }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

      </form>

</div>

@endsection