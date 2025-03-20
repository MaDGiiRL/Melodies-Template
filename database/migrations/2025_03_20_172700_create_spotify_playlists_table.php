<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpotifyPlaylistsTable extends Migration
{
    public function up()
    {
        Schema::create('spotify_playlists', function (Blueprint $table) {
            $table->id();
            // ID dell'utente che ha creato la playlist (potrebbe essere lo user_id della tua applicazione o l'ID Spotify)
            $table->unsignedBigInteger('user_id');
            // Se vuoi salvare l'ID della playlist generato da Spotify
            $table->string('spotify_playlist_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('public')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spotify_playlists');
    }
}
