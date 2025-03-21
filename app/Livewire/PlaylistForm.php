<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Playlist;

class PlaylistForm extends Component
{
    use WithFileUploads;

    public $name; // Nome della playlist
    public $artists = []; // Array di artisti

    // Avvio con un blocco artista vuoto
    public function mount()
    {
        $this->artists = [
            ['name' => '', 'song' => '', 'url_cover' => null, 'url_song' => '']
        ];
    }

    // Aggiunge un nuovo blocco artista
    public function addArtist()
    {
        $this->artists[] = ['name' => '', 'song' => '', 'url_cover' => null, 'url_song' => ''];
    }

    // Rimuove un blocco artista in base all'indice
    public function removeArtist($index)
    {
        unset($this->artists[$index]);
        $this->artists = array_values($this->artists);
    }

    // Salva la playlist e tutti gli artisti
    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'artists.*.name' => 'required|string|max:255',
            'artists.*.song' => 'required|string|max:255',
            'artists.*.url_song' => 'nullable|string|max:255',
            'artists.*.url_cover' => 'nullable|image|max:10240', // max 10MB per immagine
        ]);

        // Prepara i dati degli artisti; se presente il file, lo salva
        $artistsData = [];
        foreach ($this->artists as $artist) {
            $artistData = $artist;
            if (isset($artist['url_cover']) && $artist['url_cover']) {
                // Salva il file e sostituisce l'oggetto file con il percorso
                $artistData['url_cover'] = $artist['url_cover']->store('images', 'public');
            }
            $artistsData[] = $artistData;
        }

        Playlist::create([
            'name' => $this->name,
            'artists' => json_encode($artistsData),
        ]);

        $this->reset(['name', 'artists']);
        $this->mount(); // Ricarica un blocco artista vuoto

        session()->flash('message', 'Playlist creata con successo!');
    }

    public function render()
    {
        return view('livewire.playlist-form');
    }
}
