<div class="container bg-header">
    <div class="row justify-content-end">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <form class="form-inline my-2 my-lg-0 d-flex flex-row">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                </form>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0 gap-5">
                        <li class="nav-item active">
                            <a class="nav-link-custom" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-custom" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-custom" href="#">Premium</a>
                        </li>
                    </ul>
                </div>
                @guest
                <a href="{{route('login')}}" class="btn btn-light me-1 px-md-5">Login</a>
                <a href="{{route('register')}}" class="btn btn-outline-light px-md-5">Register</a>
                @endguest
            </nav>
        </div>
        <div class="col-md-6 pt-5 mt-5">
            <h1 class="text-white">All the <span class="text-pink">Best Songs</span> in One Place</h1>
            <p class="lead text-white pt-2">On our website, you can access an amazing collection of popular and new songs. Stream your favorite tracks in high quality and enjoy without interruptions. Whatever your taste in music, we have it all for you!</p>
            <a href="" class="btn btn-light me-1 px-5">Discover Now</a>
            <a href="" class="btn btn-outline-light px-5">Create Playlist</a>
        </div>
    </div>
</div>