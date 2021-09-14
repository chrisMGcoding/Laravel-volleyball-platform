@extends('template.template')

@section('content')

<div class="container d-flex justify-content-center">

    <h1>Joueur</h1>
    <button class="m-2 rounded bg-primary">
        <a href="{{ route('joueur.create') }}"><p class="text-dark text-decoration-none">Ajouter</p></a>
    </button>

</div>

<div class="container">

    <table class="table">

        <thead >
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Equipe</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @foreach($joueur as $item)

            <tr>
                <th scope="row">{{ ($item->id) }}</th>
                <td>{{ ($item->nom) }}</td>
                <td>{{ ($item->prenom) }}</td>
                <td>
                    @if (($item->equipe) == null) 
                        pas d'équipe
                    @else 
                        {{ ($item->equipe->club) }}
                    @endif
                </td>
                <td>
                    <div class="d-flex">
                        <form action="{{ route('joueur.destroy', $item->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="rounded m-3 bg-danger" type="submit">Delete</button>
                        </form>

                        <button class="rounded m-3 bg-warning"><a class="text-decoration-none text-dark" href="{{ route('joueur.show', $item->id)}}">Show</a></button>

                        <button class="rounded m-3 bg-success"><a class="text-decoration-none text-dark" href="{{ route('joueur.edit', $item->id)}}">Update</a></button>
                    </div>
                </td>
            </tr>

        @endforeach

        </tbody>

    </table>

    </div>


@endsection