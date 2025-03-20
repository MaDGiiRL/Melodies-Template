<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SpotifyService;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PublicController extends Controller implements HasMiddleware
{
    protected $spotifyService;

    public static function middleware(): array
    {
        return [
            'verified'
        ];
    }

    public function __construct(SpotifyService $spotifyService)
    {
        // Assegniamo il servizio alla proprietà
        $this->spotifyService = $spotifyService;
    }

    public function index()
    {
        return view('index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query', 'Imagine Dragons');
        // Utilizza la stessa proprietà spotifyService per effettuare la ricerca
        $results = $this->spotifyService->searchTrack($query);

        return view('spotify.search', compact('results'));
    }

    // Vista per le canzoni più ascoltate
    public function topTracks()
    {
        $tracksData = $this->spotifyService->getTopTracks();
        return view('top_tracks', compact('tracksData'));
    }

    // Vista per le playlist più ascoltate
    public function topPlaylists()
    {
        $playlistsData = $this->spotifyService->getTopPlaylists();
        return view('top_playlists', compact('playlistsData'));
    }

    // Vista per la creazione di una playlist
    public function createPlaylist()
    {
        return view('create_playlist');
    }

    // Metodo per salvare la nuova playlist tramite una richiesta POST
    public function storePlaylist(Request $request)
    {
        // Validazione dei dati
        $data = $request->validate([
            'user_id'      => 'required',
            'user_token'   => 'required',
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'public'       => 'nullable|boolean',
        ]);

        $result = $this->spotifyService->createPlaylist($data);

        return redirect()->back()->with('success', 'Playlist creata con successo!');
    }
}
