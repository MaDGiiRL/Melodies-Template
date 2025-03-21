<x-layout title="Trending Playlists">
    <div class="container py-5">
        <h2 class="text-white pb-3">Playlist Salvate</h2>

        @forelse($playlists as $playlist)
        <div class="card bg-dark text-white mb-4">
            <div class="card-header">
                <h4>{{ $playlist->name }}</h4>
            </div>
            <div class="card-body">
                <!-- Header della grid -->
                <div class="row grid-header align-items-center mb-3">
                    <div class="col-md-1 col-lg-1 col-2">Cover</div>
                    <div class="col-md-3 col-lg-3 col-4">Artista</div>
                    <div class="col-md-3 col-lg-3 col-4">Canzone</div>
                    <div class="col-md-3 col-lg-3 col-4">URL Canzone</div>
                    <div class="col-md-2 col-lg-2 col-2"></div>
                </div>

                @php
                $artists = json_decode($playlist->artists, true);
                @endphp

                @if(is_array($artists) && count($artists))
                @foreach($artists as $artist)
                <div class="row grid-row align-items-center mb-3">
                    <div class="col-md-1 col-lg-1 col-2">
                        @if(!empty($artist['url_cover']))
                        <img src="{{ asset('storage/' . $artist['url_cover']) }}" alt="Cover" class="img-fluid rounded" width="50" height="50">
                        @else
                        <span>No Img</span>
                        @endif
                    </div>
                    <div class="col-md-3 col-lg-3 col-4">
                        <strong>{{ $artist['name'] ?? 'N/A' }}</strong>
                    </div>
                    <div class="col-md-3 col-lg-3 col-4">
                        {{ $artist['song'] ?? 'N/A' }}
                    </div>
                    <div class="col-md-3 col-lg-3 col-4">
                        @if(!empty($artist['url_song']))
                        <a href="{{ $artist['url_song'] }}" target="_blank" class="text-white text-decoration-none">{{ $artist['url_song'] }}</a>
                        @else
                        N/A
                        @endif
                    </div>
                    <div class="col-md-2 col-lg-2 col-2">
                        {{-- Azioni eventuali --}}
                    </div>
                </div>
                @endforeach
                @else
                <p class="text-white">Nessun artista presente in questa playlist.</p>
                @endif
            </div>
        </div>
        @empty
        <p class="text-white">Nessuna playlist salvata.</p>
        @endforelse
    </div>
</x-layout>
