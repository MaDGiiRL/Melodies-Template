<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class SpotifyService
{
    protected $clientId;
    protected $clientSecret;
    protected $tokenUrl = 'https://accounts.spotify.com/api/token';

    public function __construct()
    {
        $this->clientId = config('services.spotify.client_id');
        $this->clientSecret = config('services.spotify.client_secret');
    }

    /**
     * Ottiene il token di accesso utilizzando il Client Credentials Flow.
     * Utilizziamo la cache per salvare il token finché è valido.
     */
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

    /**
     * Effettua una richiesta GET alle API di Spotify
     */
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

    // Puoi aggiungere altri metodi per interagire con le API, ad esempio per cercare un brano
    public function searchTrack($query, $limit = 10)
    {
        return $this->get('search', [
            'q' => $query,
            'type' => 'track',
            'limit' => $limit,
        ]);
    }
}
