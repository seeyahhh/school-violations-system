<nav class="navbar sticky-top shadow-sm" style="background-color: #ffffff; border-bottom: 6px solid #b22222;">
    <div class="container-fluid px-4 d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center">
            <button class="btn p-0 pe-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                <i class="bi bi-list text-primary fs-3"></i>
            </button>

            <a href="{{ route('student.dashboard.index') }}" class="text-decoration-none d-block">
                <h5 class="mb-0 fw-bold" style="color: #800000;">IsKorrections</h5>

                <small class="text-muted">
                    @yield('navbar-title', '')
                </small>
            </a>
        </div>

        <div class="d-flex align-items-center">
            <div class="d-flex gap-2">
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