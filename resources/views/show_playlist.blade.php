<x-layout>
    <div class="container">
        <h1>{{ $playlist->name }}</h1>
        <p>{{ $playlist->description }}</p>
        <p><strong>Pubblica:</strong> {{ $playlist->public ? 'Sì' : 'No' }}</p>

        <h3>Canzoni nella Playlist</h3>
        @if($playlist->songs->isNotEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome Canzone</th>
                        <th>Artista</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($playlist->songs as $song)
                        <tr>
                            <td>{{ $song->song_name }}</td>
                            <td>{{ $song->artist_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Questa playlist non ha ancora canzoni.</p>
        @endif

        <a href="{{ route('playlists.index') }}" class="btn btn-secondary">Torna alle Playlist</a>
    </div>
</x-layout>
