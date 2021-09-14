@extends ('template.template')

@section('content')


    <h3>Equipe remplie</h3>

    @foreach ($equipe as $item)
        <p>
            @if (count($item->joueurs) == $item->max_joueur) 
                {{$item->club}}
            @endif
        </p>
    @endforeach

    <h3>2 équipes non remplies</h3>

    @foreach ($equipe as $item)
    <p>
        @if (count($item->joueurs) < $item->max_joueur) 
            {{$item->club}}
        @endif
    </p>
    @endforeach

    <h3>4 joueurs sans équipe au hasard</h3>

    @foreach ($joueur as $item)
    <p>
        @if ($item->equipe_id == null) 
            {{ $item->nom }}
        @endif
    </p>
    @endforeach

    <h3>4 joueurs avec équipe</h3>

    @foreach ($joueur as $item)
    <p>
        @if ($item->equipe_id != null) 
            {{ $item->nom }}
        @endif
    </p>
    @endforeach

    <h3>Equipe européenne</h3>

    @foreach ($equipe as $item)
        <p>
            @if ($item->continent->continent == 'Europe')
                {{$item->club}}
            @endif
        </p>
    @endforeach

    <h3>Equipe non-européenne</h3>

    @foreach ($equipe as $item)
    <p>
        @if ($item->continent->continent != 'Europe')
            {{$item->club}}
        @endif
    </p>
@endforeach

    <h3>5 joueuses au hasard avec équipe</h3>

    <h3>5 joueurs au hasard avec équipe</h3>

@endsection