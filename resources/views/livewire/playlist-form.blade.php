<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <!-- Nome Playlist -->
        <div class="my-3">
            <label class="form-label">Playlist Name</label>
            <input type="text" class="form-control" wire:model="name">
        </div>

        <h4 class="small">Add a <span class="text-pink">Song</span></h4>
        <p class="small text-white-50">
            Presso the red button to cancel all the info about the song
        </p>

        <div id="artists-container" class="container">
            @foreach($artists as $index => $artist)
            <div class="row artist-block d-flex flex-wrap align-items-center mb-2" wire:key="artist-{{ $index }}">

                <div class="my-1 col-6">
                    <input type="text" class="form-control me-2 small-input" wire:model="artists.{{ $index }}.name" placeholder="Artist">
                </div>

                <div class="my-1 col-6">
                    <input type="text" class="form-control me-2 small-input" wire:model="artists.{{ $index }}.song" placeholder="Song">
                </div>

                <div class="my-1">
                    <input type="file" class="form-control me-2 small-input" wire:model="artists.{{ $index }}.url_cover">
                </div>

                <div class="my-1 d-flex flew-row">
                    <input type="text" class="form-control me-2 small-input" wire:model="artists.{{ $index }}.url_song" placeholder="URL Song">

                    <button type="button" class="btn btn-danger" wire:click="removeArtist({{ $index }})"><i class="bi bi-trash"></i></button>
                </div>
            </div>
            @endforeach
        </div>


        <button type="button" class="btn btn-light w-100 my-3" wire:click="addArtist">+ Aggiungi Artista</button>

    
        <button type="submit" class="btn btn-outline-light w-100">Salva Playlist</button>

    
        @if (session()->has('message'))
        <p class="alert alert-success mt-3">{{ session('message') }}</p>
        @endif
    </form>
</div>