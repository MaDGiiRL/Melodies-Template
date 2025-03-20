<x-layout>
    <div class="container">
        <h1>Playlist più ascoltate</h1>

        @if(isset($playlistsData['playlists']['items']) && is_array($playlistsData['playlists']['items']))
        <ul class="list-group">
            @foreach($playlistsData['playlists']['items'] as $playlist)
                @if(!empty($playlist['name'])) {{-- Controlla se il nome è presente --}}
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            @if(isset($playlist['images'][0]['url'])) {{-- Verifica se c'è un'immagine --}}
                                <img src="{{ $playlist['images'][0]['url'] }}" alt="Immagine Playlist" class="rounded-circle" width="50" height="50" style="margin-right: 10px;">
                            @endif
                            <div>
                                <strong>{{ $playlist['name'] }}</strong>
                                <br>
                                Creato da: {{ $playlist['owner']['display_name'] ?? 'Sconosciuto' }}
                            </div>
                        </div>
                        @if(isset($playlist['tracks']['total']))
                            <span class="badge bg-success rounded-pill">{{ $playlist['tracks']['total'] }} brani</span>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>
        @else
            <p>Nessuna playlist trovata o problema di connessione con l'API di Spotify.</p>
        @endif
    </div>
</x-layout>