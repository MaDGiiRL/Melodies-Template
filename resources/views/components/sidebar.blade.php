    <!-- Offcanvas Sidebar per Mobile -->
    <div class="offcanvas offcanvas-start offcanvas-bg text-white" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="mobileSidebarLabel">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a href="{{route('index')}}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <img src="/images/Melodies.png" alt="Logo" class="py-5">
            </a>
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
                <h6>Menù</h6>
                <li class="nav-item">
                    <a href="{{route('index')}}" class="nav-link"><i class="bi bi-house"></i> <span>Home</span></a>
                </li>
                <li>
                    <a href="{{route('premium')}}" class="nav-link"><i class="bi bi-star-fill"></i> <span>Premium</span></a>
                </li>
                <li>
                    <a href="{{route('contacts')}}" class="nav-link"><i class="bi bi-person-lines-fill"></i> <span>Contacts</span></a>
                </li>
                @guest
                <li>
                    <a href="{{route('login')}}" class="nav-link"><i class="bi bi-emoji-smile"></i> <span>Login</span></a>
                </li>
                <li>
                    <a href="{{route('register')}}" class="nav-link"><i class="bi bi-emoji-sunglasses"></i> <span>Register</span></a>
                </li>
                @endguest
                <hr>
                <h6>Library</h6>
                <li>
                    <a href="{{ url('/spotify/search') }}" class="nav-link"><i class="bi bi-search"></i> <span>Search</span></a>
                </li>
                <li>
                    <a href="{{route('top.playlists')}}" class="nav-link"><i class="bi bi-music-note-list"></i> <span>Top Playlists</span></a>
                </li>
                @auth
                <hr>
                <h6>Playlist</h6>
                <li>
                    <a href="{{route('spotify.create')}}" class="nav-link"><i class="bi bi-folder-plus"></i> <span>Create Playlist</span></a>
                </li>
                <li>
                    <a href="{{route('spotify.show')}}" class="nav-link"><i class="bi bi-suit-heart-fill"></i> <span>Your Playlists</span></a>
                </li>
            </ul>
            <hr>
            <div class="dropdown pb-4">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUserDesktop" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://i.pinimg.com/1200x/85/5b/2b/855b2b606c64c961da2922a240a43236.jpg" alt="User" width="30" height="30" class="rounded-circle">
                    <span class="mx-1"> {{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="d-flex justify-content-center">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-light">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            @endauth
        </div>
    </div>

    <!-- Sidebar fissa per Desktop -->
    <div class="sidebar-fixed d-none d-md-block bg-dark-custom text-white p-3">
        <a href="{{route('index')}}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="/images/Melodies.png" alt="Logo" class="py-5">
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
            <h6>Menù</h6>
            <li class="nav-item">
                <a href="{{route('index')}}" class="nav-link"><i class="bi bi-house"></i> <span>Home</span></a>
            </li>
            <li>
                <a href="{{route('premium')}}" class="nav-link"><i class="bi bi-star-fill"></i> <span>Premium</span></a>
            </li>
            <li>
                <a href="{{route('contacts')}}" class="nav-link"><i class="bi bi-person-lines-fill"></i> <span>Contacts</span></a>
            </li>
            @guest
            <li>
                <a href="{{route('login')}}" class="nav-link"><i class="bi bi-emoji-smile"></i> <span>Login</span></a>
            </li>
            <li>
                <a href="{{route('register')}}" class="nav-link"><i class="bi bi-emoji-sunglasses"></i> <span>Register</span></a>
            </li>
            @endguest
            <hr>
            <h6>Library</h6>
            <li>
                <a href="{{ url('/spotify/search') }}" class="nav-link"><i class="bi bi-search"></i> <span>Search</span></a>
            </li>
            <li>
                <a href="{{route('top.playlists')}}" class="nav-link"><i class="bi bi-music-note-list"></i> <span>Top Playlists</span></a>
            </li>
            @auth
            <hr>
            <h6>Playlist</h6>
            <li>
                <a href="{{route('spotify.create')}}" class="nav-link"><i class="bi bi-folder-plus"></i> <span>Create Playlist</span></a>
            </li>
            <li>
                <a href="{{route('spotify.show')}}" class="nav-link"><i class="bi bi-suit-heart-fill"></i> <span>Your Playlists</span></a>
            </li>
        </ul>
        <hr>
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUserDesktop" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://i.pinimg.com/1200x/85/5b/2b/855b2b606c64c961da2922a240a43236.jpg" alt="User" width="30" height="30" class="rounded-circle">
                <span class="mx-1"> {{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li class="d-flex justify-content-center">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-light">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        @endauth
    </div>


    <nav class="navbar navbar-dark bg-dark-custom d-md-none">
        <div class="container-fluid">
            <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </nav>