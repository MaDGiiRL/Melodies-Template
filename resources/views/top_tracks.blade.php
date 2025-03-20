<x-layout>
    <div class="container">
        <h1>Canzoni più ascoltate</h1>
        @if(isset($tracksData) && isset($tracksData['tracks']))
        <ul class="list-group">
            @foreach($tracksData['tracks'] as $track)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $track['name'] }}</strong>
                    di {{ $track['artists'][0]['name'] }}
                </div>
                @if(isset($track['popularity']))
                <span class="badge bg-primary rounded-pill">Popolarità: {{ $track['popularity'] }}</span>
                @endif
            </li>
            @endforeach
        </ul>
        @else
        <p>Nessuna canzone trovata o problema di connessione con l'API di Spotify.</p>
        @endif
    </div>
</x-layout>