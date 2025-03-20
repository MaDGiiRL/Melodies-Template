<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SpotifyService;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PublicController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            'verified'
        ];
    }

    public function index()
    {
        return view('index');
    }

    protected $spotify;

    public function __construct(SpotifyService $spotify)
    {
        $this->spotify = $spotify;
    }

    public function search(Request $request)
    {
        $query = $request->input('query', 'Imagine Dragons');
        $results = $this->spotify->searchTrack($query);

        return view('spotify.search', compact('results'));
    }
}
