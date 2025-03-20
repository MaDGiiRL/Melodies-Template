<x-layout>
    <div class="container">
        <h1>Playlist più ascoltate</h1>

        @if(isset($playlistsData['playlists']['items']) && is_array($playlistsData['playlists']['items']))
        <ul class="list-group">
            @foreach($playlistsData['playlists']['items'] as $playlist)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $playlist['name'] ?? 'Senza nome' }}</strong>
                    <br>
                    Creato da: {{ $playlist['owner']['display_name'] ?? 'Sconosciuto' }}
                </div>
                @if(isset($playlist['tracks']['total']))
                <span class="badge bg-success rounded-pill">{{ $playlist['tracks']['total'] }} brani</span>
                @endif
            </li>
            @endforeach
        </ul>
        @else
        <p>Nessuna playlist trovata o problema di connessione con l'API di Spotify.</p>
        @endif
    </div>
</x-layout>