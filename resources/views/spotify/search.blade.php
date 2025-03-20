<x-layout>
    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <h1 class="text-white">Search a <span class="text-pink">Song</span></h1>
                <div class="row">
                    <div class="col-5">
                        <form action="{{ url('/spotify/search') }}" method="GET">
                            <div class="mb-3">
                                <input type="text" name="query" class="form-control" placeholder="Inserisci il nome dell'artista o del brano" value="{{ request('query') }}">
                            </div>
                            <button type="submit" class="btn btn-light">Cerca</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        @isset($results)
        <div class="container">
            <div class="row">
                <h2 class="mt-5 text-white">Results:</h2>
                @foreach ($results['tracks']['items'] as $track)
                <div class="col-4 col-md-2 col-lg-2 my-2">
                    <div class="card">
                        <img src="{{ $track['album']['images'][2]['url'] ?? '' }}" class="card-img-top p-2">
                        <div class="card-body">
                            <h6>{{ $track['name'] }}</h6>
                            <p class="card-text small text-white-50">{{ $track['artists'][0]['name'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endisset
    </div>
</x-layout>