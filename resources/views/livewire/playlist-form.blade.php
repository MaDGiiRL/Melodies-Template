<div>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Artist</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="form-group">
            <label for="spotify_url">Song</label>
            <input type="text" class="form-control" name="song" required>
        </div>

        <div class="form-group">
            <label for="image_url">Cover</label>
            <input type="url" class="form-control" name="url_cover">
        </div>

        <div class="form-group">
            <label for="followers">URL Song</label>
            <input type="url" class="form-control" name="url_song">
        </div>

        <button type="submit" class="btn btn-light mt-4 w-100">Aggiungi Artista</button>
    </form>

</div>