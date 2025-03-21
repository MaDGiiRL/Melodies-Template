<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <!-- Nome Playlist -->
        <div class="my-3">
            <label class="form-label">Nome Playlist</label>
            <input type="text" class="form-control" wire:model="name">
        </div>

        <!-- Contenitore per gli artisti -->
        <div id="artists-container">
            @foreach($artists as $index => $artist)
            <div class="artist-block d-flex flex-wrap align-items-center bg-light p-3 mb-2 rounded" wire:key="artist-{{ $index }}">
                <input type="text" class="form-control me-2 small-input" wire:model="artists.{{ $index }}.name" placeholder="Artista">
                <input type="text" class="form-control me-2 small-input" wire:model="artists.{{ $index }}.song" placeholder="Canzone">
                <input type="file" class="form-control me-2 small-input" wire:model="artists.{{ $index }}.url_cover">
                <input type="text" class="form-control me-2 small-input" wire:model="artists.{{ $index }}.url_song" placeholder="URL Canzone">
                <button type="button" class="btn btn-danger" wire:click="removeArtist({{ $index }})">✖</button>
            </div>
            @endforeach
        </div>

        <!-- Pulsante per aggiungere un nuovo artista -->
        <button type="button" class="btn btn-secondary w-100 my-3" wire:click="addArtist">+ Aggiungi Artista</button>

        <!-- Pulsante per salvare la playlist -->
        <button type="submit" class="btn btn-primary w-100">Salva Playlist</button>

        <!-- Messaggio di conferma -->
        @if (session()->has('message'))
        <p class="alert alert-success mt-3">{{ session('message') }}</p>
        @endif
    </form>
</div>
