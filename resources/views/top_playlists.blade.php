<x-layout title="Trending Playlists">
    <div class="container py-5">
        <h2 class="text-white pb-3">Trending <span class="text-pink">Playlists</span></h2>

        <!-- Header della grid -->
        <div class="row grid-header align-items-center mb-3 py-3">
            <div class="col-md-1 col-lg-1 col-2">Cover</div>
            <div class="col-md-3 col-lg-3 col-4">Playlist</div>
            <div class="col-md-4 col-lg-4 col-4">Creator</div>
            <div class="col-md-2 col-lg-2 col-4">Total Tracks</div>
            <div class="col-md-1 col-lg-1 col-2"></div>
        </div>

        <!-- Loop per le Playlist -->
        @if(isset($playlistsData['playlists']['items']) && is_array($playlistsData['playlists']['items']))
        @foreach($playlistsData['playlists']['items'] as $playlist)
        @if(!empty($playlist['name'])) {{-- Controlla se il nome è presente --}}
        <div class="row grid-row align-items-center mb-3">
            <div class="col-md-1 col-lg-1 col-2">
                @if(isset($playlist['images'][0]['url'])) {{-- Verifica se c'è un'immagine --}}
                <img src="{{ $playlist['images'][0]['url'] }}" alt="Immagine Playlist" class="img-fluid rounded" width="50" height="50">
                @endif
            </div>
            <div class="col-md-3 col-lg-3 col-4">
                <strong>
                    @if(isset($playlist['external_urls']['spotify']))
                    <a href="{{ $playlist['external_urls']['spotify'] }}" target="_blank" class="text-white text-decoration-none">{{ $playlist['name'] }}</a>
                    @else
                    {{ $playlist['name'] }}
                    @endif
                </strong>
            </div>
            <div class="col-md-4 col-lg-4 col-4 d-md-block d-lg-block d-none">
                {{ $playlist['owner']['display_name'] ?? 'Sconosciuto' }}
            </div>
            <div class="col-md-2 col-lg-2 col-4">
                {{ $playlist['tracks']['total'] ?? 'N/A' }} brani
            </div>
            <div class="col-md-1 col-lg-1 col-1">
                @if(isset($playlist['external_urls']['spotify']))
                <a href="{{ $playlist['external_urls']['spotify'] }}" target="_blank" class="btn btn-link">
                    <i class="bi bi-arrow-up-right-square text-pink"></i>
                </a>
                @endif
            </div>
        </div>
        @endif
        @endforeach
        @else
        <p>Nessuna playlist trovata o problema di connessione con l'API di Spotify.</p>
        @endif
    </div>
</x-layout>