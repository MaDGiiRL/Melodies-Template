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

    public function contacts()
    {
        return view('contacts');
    }

    public function create()
    {
        return view('spotify.create');
    }

    public function show()
    {
        $playlists = Playlist::all();

        return view('spotify.show', compact('playlists'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query', 'a');
        $results = $this->spotifyService->searchTrack($query);
        return view('spotify.search', compact('results'));
    }

    public function topPlaylists()
    {
        $playlistsData = $this->spotifyService->getTopPlaylists();
        return view('top_playlists', compact('playlistsData'));
    }

}
