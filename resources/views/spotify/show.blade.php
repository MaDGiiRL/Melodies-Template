<x-layout title="Trending Playlists">
    <div class="container py-5">
        @forelse($playlists as $playlist)
        <div class="row text-white mt-5">
            <div class="col-12">
                <div class="card-header">
                    <h4>{{ $playlist->name }}</h4>
                </div>
            </div>
            <div class="card-body">
                <!-- Header della grid -->
                <div class="row grid-header align-items-center py-4 text-center mb-1">
                    <div class="col-md-1 col-lg-1 col-2">Cover</div>
                    <div class="col-md-3 col-lg-3 col-4">Artist</div>
                    <div class="col-md-3 col-lg-3 col-4">Song</div>
                    <div class="col-md-3 col-lg-3 col-4">URL</div>
                    <div class="col-md-2 col-lg-2 col-2"></div>
                </div>

                @php
                $artists = json_decode($playlist->artists, true);
                @endphp

                @if(is_array($artists) && count($artists))
                @foreach($artists as $artist)
                <div class="row grid-row align-items-center text-center artist-row" style="display: {{ $loop->index > 1 ? 'none' : 'flex' }}">
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
                        <a href="{{ $artist['url_song'] }}" target="_blank" class="btn btn-link">
                            <i class="bi bi-arrow-up-right-square text-pink"></i>
                        </a>
                        @else
                        N/A
                        @endif
                    </div>
                    <div class="col-md-2 col-lg-2 col-2">
                        {{-- Azioni eventuali --}}
                    </div>
                </div>
                @endforeach

                <!-- Pulsanti Show More e Show Less -->
                @if(count($artists) > 2)
                <div class="text-center mt-3">
                    <button class="btn btn-light show-more-btn">Show More</button>
                    <button class="btn btn-outline-light show-less-btn" style="display: none;">Show Less</button>
                </div>
                @endif

                @else
                <p class="text-white">Nessun artista presente in questa playlist.</p>
                @endif
            </div>
        </div>
        @empty
        <p class="text-white">Nessuna playlist salvata.</p>
        @endforelse
    </div>

    <!-- Script per mostrare/nascondere gli elementi -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".show-more-btn").forEach(button => {
                button.addEventListener("click", function() {
                    let parent = this.closest(".card-body");
                    parent.querySelectorAll(".artist-row").forEach(row => {
                        row.style.display = "flex";
                    });
                    this.style.display = "none"; // Nasconde "Show More"
                    parent.querySelector(".show-less-btn").style.display = "inline-block"; // Mostra "Show Less"
                });
            });

            document.querySelectorAll(".show-less-btn").forEach(button => {
                button.addEventListener("click", function() {
                    let parent = this.closest(".card-body");
                    parent.querySelectorAll(".artist-row").forEach((row, index) => {
                        if (index > 1) {
                            row.style.display = "none"; // Nasconde tutti tranne i primi 2
                        }
                    });
                    this.style.display = "none"; // Nasconde "Show Less"
                    parent.querySelector(".show-more-btn").style.display = "inline-block"; // Mostra di nuovo "Show More"
                });
            });
        });
    </script>
</x-layout>