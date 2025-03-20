<x-layout title="Login">
    <div class="bg-register pb-5 vh-100 mt-5 pt-5 auth">
        <div class="container py-5 my-5 py-md-0 my-md-0 register">
            <div class="row justify-content-center p-5 mt-4 mt-md-0">
                <div class="col-md-6  bg-card text-white p-4 p-md-5">
                    <h3 class="text-center">Login</h3>
                    <p class="text-center text-white-50">Please enter your e-mail and password:</p>
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li><i class="bi bi-exclamation-circle"></i> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label small">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="my-3 text-center">
                            <button type="submit" class="btn btn-light w-100 fs-5">Login</button>
                        </div>
                    </form>
                    <div class="d-flex flex-row gap-5 justify-content-center">
                        <button class="btn btn-outline-secondary bg-body-tertiary text-black border d-flex align-items-center justify-content-center">
                            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="me-2" width="20"> <span class="d-md-block d-none">Register With Google</span>
                        </button>
                        <a href="{{ route('github.login') }}" class="btn link-light btn-dark border d-flex align-items-center justify-content-center">
                            <i class="bi bi-github pe-2"></i> <span class="d-md-block d-none">Login With GitHub</span>
                        </a>
                    </div>
                    <p class="text-center mt-4">Forgot you password? <a class="text-blue" href="{{ route('password.request') }}">Recover Password</a></p>
                    <p class="text-center mt-4">You don't have an account? <a class="text-blue" href="{{route('register')}}">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</x-layout>