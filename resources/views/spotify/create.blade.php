<x-layout title="Create Your Playlist">

    <div id="mainContainer" class="mainContainer">
        <div class="mt-5" style="z-index: 9999">
            <div class="container mt-5">
                <div class="row justify-content-center p-5 mt-4 mt-md-0">
                    <div class="col-md-8  bg-card text-white p-4 p-md-5">
                        <h3 class="text-center">Start Building Your <span class="text-pink">Playlist</span></h3>
                        <p class="text-center text-white-50">Please enter artist name and song, if you want you can even add URL to the song and a cover:</p>
                        <livewire:playlist-form />
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>