<x-layout title="Contacts">
    <div class="bg-register pb-5 vh-100 mt-5 pt-5 auth">
        <div class="container py-5 my-5 py-md-0 my-md-0 register">
            <div class="row justify-content-center p-5 mt-4 mt-md-0">
                <div class="col-md-6  bg-card text-white p-4 p-md-5">
                    <h3 class="text-center">Contacts Us</h3>
                    <p class="text-center text-white-50">Please enter your name, your email and your message:</p>
                    <form method="POST" action="{{ route('contact.send') }}">
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
                            <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Nome</label>
                            <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Message</label>
                            <textarea name="user_message" id="" cols="50" row="10" class="form-control"></textarea>
                        </div>
                        <div class="my-3 text-center">
                            <button type="submit" class="btn btn-light w-100 fs-5">Send Message</button>
                        </div>
                        @if (session()->has('message'))
                        <p class="alert alert-success mt-3">{{ session('message') }}</p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>