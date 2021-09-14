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

{{-- ----------------------------------- --}}

    <h3>2 équipes non remplies</h3>
    @php
        $i = 0;
    @endphp

    @foreach ($equipe->shuffle() as $item)
    <p>
        @if (count($item->joueurs) < $item->max_joueur && $i < 2) 
            @php
                $i++;
            @endphp
            {{$item->club}}
        @endif
    </p>
    @endforeach

{{-- ----------------------------------- --}}

    <h3>4 joueurs sans équipe au hasard</h3>
    @php
        $i = 0;
    @endphp

    @foreach ($joueur->shuffle() as $item)
    <p>
        @if ($item->equipe_id == null && $i < 4)
            @php
                $i++;   
            @endphp 
            {{ $item->nom }}
        @endif
    </p>
    @endforeach

{{-- ----------------------------------- --}}


    <h3>4 joueurs avec équipe</h3>
    @php
        $i = 0;
    @endphp

    @foreach ($joueur->shuffle() as $item)
    <p>
        @if ($item->equipe_id != null && $i < 4) 
            @php
                $i++;   
            @endphp
            {{ $item->nom }}
        @endif
    </p>
    @endforeach

{{-- ----------------------------------- --}}


    <h3>Equipe européenne</h3>

    @foreach ($equipe as $item)
        <p>
            @if ($item->continent->continent == 'Europe')
                {{$item->club}}
            @endif
        </p>
    @endforeach

{{-- ----------------------------------- --}}


    <h3>Equipe non-européenne</h3>

    @foreach ($equipe as $item)
    <p>
        @if ($item->continent->continent != 'Europe')
            {{$item->club}}
        @endif
    </p>
@endforeach

{{-- ----------------------------------- --}}


    <h3>5 joueuses au hasard avec équipe</h3>
    @php
        $i = 0;
    @endphp

    @foreach ($joueur->shuffle() as $item)
        <p>
            @if ($item->genre == 'Femme' && $item->equipe_id != null && $i < 5)
                @php
                    $i++;
                @endphp
                {{$item->nom}}
            @endif
        </p>
    @endforeach

{{-- ----------------------------------- --}}


    <h3>5 joueurs au hasard avec équipe</h3>
    @php
        $i = 0;
    @endphp
    
    @foreach ($joueur->shuffle() as $item)
        <p>
            @if ($item->genre == 'Homme' && $item->equipe_id != null && $i < 5)
                @php
                    $i++;    
                @endphp
                {{$item->nom}}
            @endif
        </p>
    @endforeach

@endsection