<x-layout title="Email Verification - Sand & Sky">
    <div class="bg-register pb-5 vh-100 mt-5 pt-5 auth">
        <div class="container py-5 my-5 py-md-0 my-md-0 register">
            <div class="row justify-content-center p-5 mt-4 mt-md-0">
                <div class="col-md-6 border shadow roundend bg-white p-4 p-md-5">
                    <h3 class="text-center">Email Verification</h3>
                    <p class="text-center text-muted">Thank you for signing up! Please verify your email address to complete your registration.</p>
                    <ul>
                        <li><i class="bi bi-check-lg link-pink fs-4 fw-bold"></i> Check your inbox for a verification email from us.</li>
                        <li><i class="bi bi-check-lg link-pink fs-4 fw-bold"></i> Click on the verification link provided in the email.</li>
                        <li><i class="bi bi-check-lg link-pink fs-4 fw-bold"></i> If you haven't received the email, check your spam folder or request a new one below.</li>
                    </ul>
                    <p class="small">If you need further assistance, please contact our support team.</p>

                    <p class="small text-red">If you did not receive the verification email, enter your email address below and click "Resend Email."</p>

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
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
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <button type="submit" class="btn btn-outline-custom w-100 mt-3">Send Email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>