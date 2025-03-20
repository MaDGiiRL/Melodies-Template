<x-layout>
    <div class="container">
        <h1>Le tue Playlist</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($playlists->isEmpty())
            <p>Nessuna playlist disponibile.</p>
        @else
            <ul class="list-group">
                @foreach($playlists as $playlist)
                    <li class="list-group-item">
                        <strong>{{ $playlist->name }}</strong> - {{ $playlist->description ?? 'Nessuna descrizione' }}
                        <span class="badge bg-secondary">{{ $playlist->public ? 'Pubblica' : 'Privata' }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-layout>
