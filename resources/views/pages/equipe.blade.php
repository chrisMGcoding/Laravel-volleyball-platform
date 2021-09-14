@extends('template.template')

@section('content')

<div class="container d-flex justify-content-center">

    <h1>Equipe</h1>
    <button class="m-2 rounded bg-primary">
        <a href="{{ route('equipe.create') }}"><p class="text-dark text-decoration-none">Ajouter</p></a>
    </button>

</div>

<div class="container">

    <table class="table">

        <thead >
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Ville</th>
                <th scope="col">Max de joueurs</th>
                <th scope="col">ATT</th>
                <th scope="col">DEF</th>
                <th scope="col">MIL</th>
                <th scope="col">RES</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @foreach($equipe as $item)

            <tr>
                <th scope="row">{{ ($item->id) }}</th>
                <td>{{ ($item->club) }}</td>
                <td>{{ ($item->ville) }}</td>
                <td>{{ count($item->joueurs) }} / {{ ($item->max_joueur) }}</td>

                @php 

                    $att = 0;
                    $def = 0;
                    $mil = 0;
                    $res = 0;

                    foreach ($item->joueurs as $role) {
                        if ($role->role->position == 'ATT') {
                            $att++;
                        }
                        elseif ($role->role->position == 'DEF') {
                            $def++;
                        }
                        elseif ($role->role->position == 'MIL') {
                            $mil++;
                        }
                        elseif ($role->role->position == 'RES') {
                            $res++;
                        }
                    }


                @endphp

                <td>{{ $att }} / 2</td>
                <td>{{ $def }} / 2</td>
                <td>{{ $mil }} / 2</td>
                <td>{{ $res }} / 3</td>
                <td>
                    <div class="d-flex">
                        <form action="{{ route('equipe.destroy', $item->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="rounded m-3 bg-danger" type="submit">Delete</button>
                        </form>

                        <button class="rounded m-3 bg-warning"><a class="text-decoration-none text-dark" href="{{ route('equipe.show', $item->id)}}">Show</a></button>

                        <button class="rounded m-3 bg-success"><a class="text-decoration-none text-dark" href="{{ route('equipe.edit', $item->id)}}">Update</a></button>
                    </div>
                </td>
            </tr>

        @endforeach

        </tbody>

    </table>

    </div>


@endsection