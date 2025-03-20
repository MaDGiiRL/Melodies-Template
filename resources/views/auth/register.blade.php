<x-layout title="Register">
    <div class="text-white pb-5">
        <div class="container py-5 my-5 py-md-0 my-md-0 register auth">
            <div class="row justify-content-center p-5 mt-4 mt-md-0">
                <div class="col-md-6 roundend bg-card p-4 p-md-5">

                    <h3 class="text-center">Register</h3>
                    <p class="text-center text-white-50">Please fill in the fields below:</p>

                    <form method="POST" action="{{route('register')}}">
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
                            <label class="form-label small">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                        </div>
                        <div class="my-3 text-center">
                            <button type="submit" class="btn btn-light w-100 fs-5">Register</button>
                        </div>
                    </form>
                    <div class="d-flex flex-row gap-4 justify-content-center">
                        <button class="btn btn-outline-secondary bg-body-tertiary text-black border d-flex align-items-center justify-content-center">
                            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="me-2" width="20"> <span class="d-md-block d-none">Register With Google</span>
                        </button>
                        <a href="{{ route('github.login') }}" class="link-light btn btn-dark border d-flex align-items-center justify-content-center">
                            <i class="bi bi-github pe-2"></i> <span class="d-md-block d-none">Register With GitHub</span>
                        </a>
                    </div>
                    <p class="text-center mt-4">Do you already have an account? <a class="text-blue" href="{{route('login')}}">Back to Log In</a></p>
                </div>
            </div>
        </div>
    </div>
</x-layout>