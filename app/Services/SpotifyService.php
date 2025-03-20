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


    // Metodo per ottenere le top canzoni
    public function getTopTracks()
    {
        $playlistId = '37i9dQZEVXbMDoHDwVN2tF';
        $accessToken = $this->getAccessToken(); // Richiedi il token aggiornato
        $response = Http::withToken($accessToken)
            ->get("https://api.spotify.com/v1/playlists/{$playlistId}");

        return $response->json();
    }

    // Metodo per ottenere le top playlist
    public function getTopPlaylists()
    {
        $accessToken = $this->getAccessToken(); // Richiedi il token aggiornato
        $response = Http::withToken($accessToken)
            ->get("https://api.spotify.com/v1/search", [
                'q'     => 'Top',
                'type'  => 'playlist',
                'limit' => 50,
            ]);

        return $response->json();
    }

    // Metodo per creare una playlist (richiede autorizzazione utente)
    // Nota: questo esempio è semplificato; per creare una playlist per un utente
    // dovrai utilizzare il flusso di autorizzazione "Authorization Code" e ottenere un token utente.
    public function createPlaylist(array $data)
    {
        // Supponiamo di avere l'ID utente e un token utente (da gestire tramite OAuth)
        $userId = $data['user_id'];
        $userToken = $data['user_token']; // ottenuto dal processo di OAuth
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
