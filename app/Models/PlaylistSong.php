<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistSong extends Model
{
    use HasFactory;

    protected $fillable = ['playlist_id', 'song_name', 'artist_name'];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }
}
