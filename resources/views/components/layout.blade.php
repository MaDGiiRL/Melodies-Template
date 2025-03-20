<!DOCTYPE html>
<html lang="it" data-bs-theme="auto">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title ?? "Titolo di Default"}}</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <!-- Google Font Poppin -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Custom -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2  bg-dark-custom sidebar">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 position-fixed">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <img src="/images/Melodies.png" alt="Logo" class="py-5">
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <h6>
                            Menù
                        </h6>
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle ">
                                <i class="bi bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link  align-middle">
                                <i class="bi bi-box-fill"></i> <span class="ms-1 d-none d-sm-inline">Discover</span></a>
                        </li>
                        <li>
                            <a href="#" class="nav-link  align-middle">
                                <i class="bi bi-disc"></i> <span class="ms-1 d-none d-sm-inline">Albums</span></a>
                        </li>
                        <li>
                            <a href="#" class="nav-link  align-middle">
                                <i class="bi bi-person-circle"></i> <span class="ms-1 d-none d-sm-inline">Artists</span></a>
                        </li>
                        <hr>
                        <h6>
                            Library
                        </h6>
                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link  align-middle">
                                <i class="bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Categories</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link "> <span class="d-none d-sm-inline">Product</span> 1</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link "> <span class="d-none d-sm-inline">Product</span> 2</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link "> <span class="d-none d-sm-inline">Product</span> 3</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link "> <span class="d-none d-sm-inline">Product</span> 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="nav-link  align-middle">
                                <i class="bi bi-clock"></i> <span class="ms-1 d-none d-sm-inline">Recent Added</span> </a>
                        </li>
                        <hr>
                        <h6>
                            Playlist
                        </h6>
                        <li>
                            <a href="#" class="nav-link  align-middle">
                                <i class="bi bi-suit-heart-fill"></i> <span class="ms-1 d-none d-sm-inline">Your Favorite</span> </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link  align-middle">
                                <i class="bi bi-music-note-list"></i> <span class="ms-1 d-none d-sm-inline">Your Playlist</span> </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link  align-middle">
                                <i class="bi bi-folder-plus"></i> <span class="ms-1 d-none d-sm-inline">Add Playlist</span> </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30"
                                class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">Account</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3">

                <div class="min-vh-100">
                    {{$slot}}
                </div>

                <x-footer />
            </div>
        </div>
    </div>
</body>

</html>