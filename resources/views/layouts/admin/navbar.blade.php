<nav class="navbar sticky-top shadow-sm" style="background-color: #ffffff; border-bottom: 6px solid #b22222;">
    <div class="container-fluid px-4 d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center">
            <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                <i class="bi bi-list text-primary fs-3"></i>
            </button>

            <div>
                <h5 class="mb-0 fw-bold" style="color: #800000;">Violations Management</h5>

                <small class="text-muted">
                    @yield('navbar-title', '')
                </small>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <div class="position-relative me-4" style="cursor: pointer;">
                <img src="/bell.png" alt="Notifications" style="width: 24px; height: 24px; object-fit: contain;">
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-danger btn-sm" style="border-color: #800000; color: #800000;">
                    <i class="bi bi-arrow-left"></i> Back to Dashboard
                </button>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn btn-dark btn-sm">
                        <i class="bi bi-box-arrow-right"></i> Sign Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>