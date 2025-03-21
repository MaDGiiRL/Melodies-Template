<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Playlist;

class PlaylistForm extends Component
{
    use WithFileUploads;

    public $name;
    public $artists = []; 

   
    public function mount()
    {
        $this->artists = [
            ['name' => '', 'song' => '', 'url_cover' => null, 'url_song' => '']
        ];
    }

  
    public function addArtist()
    {
        $this->artists[] = ['name' => '', 'song' => '', 'url_cover' => null, 'url_song' => ''];
    }

    public function removeArtist($index)
    {
        unset($this->artists[$index]);
        $this->artists = array_values($this->artists);
    }


    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'artists.*.name' => 'required|string|max:255',
            'artists.*.song' => 'required|string|max:255',
            'artists.*.url_song' => 'nullable|string|max:255',
            'artists.*.url_cover' => 'nullable|image|max:10240', 
        ]);

        $artistsData = [];
        foreach ($this->artists as $artist) {
            $artistData = $artist;
            if (isset($artist['url_cover']) && $artist['url_cover']) {
                
                $artistData['url_cover'] = $artist['url_cover']->store('images', 'public');
            }
            $artistsData[] = $artistData;
        }

        Playlist::create([
            'name' => $this->name,
            'artists' => json_encode($artistsData),
        ]);

        $this->reset(['name', 'artists']);
        $this->mount();

        session()->flash('message', 'Playlist creata con successo!');
    }

    public function render()
    {
        return view('livewire.playlist-form');
    }
}
