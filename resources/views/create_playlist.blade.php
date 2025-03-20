<x-layout>
    <div class="container">
        <h1>Crea una nuova Playlist</h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('playlist.store') }}" method="POST">
            @csrf
            {{-- I dati dell'utente autenticato via Spotify li passiamo in campi nascosti --}}
            <input type="hidden" name="user_id" value="{{ session('spotify_user_id') }}">
            <input type="hidden" name="user_token" value="{{ session('spotify_user_token') }}">

            <div class="mb-3">
                <label for="name" class="form-label">Nome Playlist</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Inserisci il nome" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" id="description" class="form-control" placeholder="Descrizione della playlist"></textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="public" id="public" value="1" class="form-check-input">
                <label for="public" class="form-check-label">Rendi la playlist pubblica</label>
            </div>

            <button type="submit" class="btn btn-primary">Crea Playlist</button>
        </form>
    </div>
</x-layout>