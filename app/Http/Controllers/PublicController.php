<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Services\SpotifyService;
use Illuminate\Support\Facades\Http;

class PublicController extends Controller
{
    protected $spotifyService;

    public function __construct(SpotifyService $spotifyService)
    {
        $this->spotifyService = $spotifyService;
    }

    public function index()
    {
        return view('index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query', 'Imagine Dragons');
        $results = $this->spotifyService->searchTrack($query);
        return view('spotify.search', compact('results'));
    }

    public function topTracks()
    {
        $tracksData = $this->spotifyService->getTopTracks();
        return view('top_tracks', compact('tracksData'));
    }

    public function topPlaylists()
    {
        $playlistsData = $this->spotifyService->getTopPlaylists();
        return view('top_playlists', compact('playlistsData'));
    }

    public function createPlaylist()
    {
        return view('create_playlist');
    }

    public function storePlaylist(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'public' => 'nullable|boolean',
            'songs' => 'nullable|array',
            'songs.*.song_name' => 'required_with:songs.*.artist_name|string|max:255',
            'songs.*.artist_name' => 'required_with:songs.*.song_name|string|max:255',
        ]);

        $playlist = Playlist::create([
            'name' => $request->name,
            'description' => $request->description,
            'public' => $request->public ?? false,
        ]);

        if ($request->has('songs')) {
            foreach ($request->songs as $song) {
                $playlist->songs()->create($song);
            }
        }

        return redirect()->route('playlists.index')->with('success', 'Playlist creata con successo!');
    }

    public function showPlaylists()
    {
        $playlists = Playlist::all();
        return view('playlists', compact('playlists'));
    }

    public function showPlaylist(Playlist $playlist)
    {
        $playlist->load('songs'); // Assicuriamoci che carichi le canzoni associate
        return view('playlists.show', compact('playlist'));
    }
}
