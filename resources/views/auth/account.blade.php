<x-layout title="My Account - Sand & Sky">
    <div class="bg-register">
        <div class="container min-vh-100">
            <div class="row pt-5">
                <div class="col-md-3 account-nav">
                    <h4 class="fw-bold">Account</h4>
                    <nav id="account-nav" class="nav flex-column">
                        <a class="nav-link active" href="#" data-target="contact-info">Contact information</a>
                        <a class="nav-link" href="#" data-target="change-password">Change password</a>
                        <a class="nav-link" href="#" data-target="addresses">Addresses</a>
                        <a class="nav-link" href="#" data-target="orders">Orders <i class="bi bi-arrow-right-short"></i></a>
                        <a class="nav-link" href="#" data-target="wishlist">Wishlist <i class="bi bi-arrow-right-short"></i></a>
                    </nav>
                </div>
                <div class="col-md-9">
                    <div class="account-container">
                        <section id="contact-info" class="content-section active">
                            <h4 class="fw-bold text-dark pb-4">Contact Information</h4>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label small">Mail</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label small">First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label small">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-custom w-100 py-2">Save</button>
                            </form>
                        </section>
                        <section id="change-password" class="content-section">
                            <h4 class="fw-bold text-dark pb-4">Change Password</h4>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label small">Current Password</label>
                                    <input type="password" class="form-control" placeholder="Current Password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">New Password</label>
                                    <input type="password" class="form-control" placeholder="New Password">
                                </div>
                                <button type="submit" class="btn btn-outline-custom w-100 py-2">Update Password</button>
                            </form>
                        </section>
                        <section id="addresses" class="content-section">
                            <h4 class="fw-bold text-dark pb-4">Addresses</h4>
                            <p>Manage your saved addresses here.</p>
                        </section>
                        <section id="orders" class="content-section">
                            <h4 class="fw-bold text-dark pb-4">Orders</h4>
                            <p>View your order history here.</p>
                        </section>
                        <section id="wishlist" class="content-section">
                            <h4 class="fw-bold text-dark pb-4">Wishlist</h4>
                            <p>See your saved items here.</p>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('#account-nav .nav-link').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                document.querySelectorAll('.content-section').forEach(section => {
                    section.classList.remove('active');
                });
                document.querySelectorAll('#account-nav .nav-link').forEach(link => {
                    link.classList.remove('active');
                });

                const targetSection = document.getElementById(this.getAttribute('data-target'));
                if (targetSection) {
                    targetSection.classList.add('active');
                    this.classList.add('active');
                }
            });
        });
    </script>
</x-layout>