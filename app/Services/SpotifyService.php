<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class SpotifyService
{
    protected $clientId;
    protected $clientSecret;
    protected $tokenUrl = 'https://accounts.spotify.com/api/token';
    protected $token;

    public function __construct()
    {
        $this->clientId = config('services.spotify.client_id');
        $this->clientSecret = config('services.spotify.client_secret');
        $this->token = $this->getAccessToken();
    }


    public function getAccessToken()
    {
        return Cache::remember('spotify_access_token', 3500, function () {
            $response = Http::withHeaders([
                'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret),
            ])->asForm()->post($this->tokenUrl, [
                'grant_type' => 'client_credentials',
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['access_token'];
            }

            throw new \Exception('Impossibile ottenere il token da Spotify');
        });
    }

    
    public function get($endpoint, $query = [])
    {
        $accessToken = $this->getAccessToken();

        $response = Http::withToken($accessToken)
            ->get("https://api.spotify.com/v1/{$endpoint}", $query);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Errore nella chiamata all’API di Spotify: ' . $response->body());
    }

    public function searchTrack($query)
    {
        return $this->get('search', [
            'q' => $query,
            'type' => 'track',
            'limit' => 50,
        ]);
    }

    public function getTopPlaylists()
    {
        $accessToken = $this->getAccessToken(); 
        $response = Http::withToken($accessToken)
            ->get("https://api.spotify.com/v1/search", [
                'q'     => 'Top',
                'type'  => 'playlist',
                'limit' => 50,
            ]);

        return $response->json();
    }

    public function createPlaylist(array $data)
    {
        $userId = $data['user_id'];
        $userToken = $data['user_token'];
        $payload = [
            'name' => $data['name'],
            'description' => $data['description'] ?? '',
            'public' => $data['public'] ?? false,
        ];

        $response = Http::withToken($userToken)
            ->post("https://api.spotify.com/v1/users/{$userId}/playlists", $payload);

        return $response->json();
    }


}
