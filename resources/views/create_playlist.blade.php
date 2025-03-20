<x-layout>
    <div class="container">
        <h1>Crea una nuova Playlist</h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('store.playlist') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nome Playlist</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Descrizione (opzionale)</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="public">Pubblica?</label>
                <select name="public" id="public" class="form-control">
                    <option value="1">Sì</option>
                    <option value="0">No</option>
                </select>
            </div>

            <h3>Aggiungi Canzoni</h3>
            <div id="songs-container">
                <div class="song-group">
                    <input type="text" name="songs[0][song_name]" class="form-control" placeholder="Nome Canzone" required>
                    <input type="text" name="songs[0][artist_name]" class="form-control" placeholder="Nome Artista" required>
                </div>
            </div>
            <button type="button" id="add-song" class="btn btn-secondary mt-2">Aggiungi Canzone</button>

            <button type="submit" class="btn btn-primary mt-3">Crea Playlist</button>
        </form>
  
    </div>

    <script>
        document.getElementById('add-song').addEventListener('click', function() {
            let container = document.getElementById('songs-container');
            let index = container.getElementsByClassName('song-group').length;
            let newSongGroup = document.createElement('div');
            newSongGroup.classList.add('song-group');
            newSongGroup.innerHTML = `
                <input type="text" name="songs[${index}][song_name]" class="form-control mt-2" placeholder="Nome Canzone" required>
                <input type="text" name="songs[${index}][artist_name]" class="form-control mt-2" placeholder="Nome Artista" required>
            `;
            container.appendChild(newSongGroup);
        });
    </script>
</x-layout>