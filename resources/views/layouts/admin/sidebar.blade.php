<!-- Sidebar -->
<div id="sidebar" class="offcanvas offcanvas-start bg-primary text-white vh-100" tabindex="-1"
    aria-labelledby="sidebarLabel">
    <!-- Header -->
    <div class="offcanvas-header d-flex justify-content-between align-items-start">
        <div>
            <h5 class="fw-bold mb-0">IsKorrections</h5>
            <small class="text-white-50">Violations & Sanctions</small>
        </div>
        <button type="button" class="border-0 bg-primary" data-bs-dismiss="offcanvas">
            <i class="bi bi-layout-sidebar text-white fs-5"></i>
        </button>
    </div>

    <!-- Navigation -->
    <div class="offcanvas-body d-flex flex-column px-3 pt-2">
        <small class="text-uppercase text-white-50 fw-bold mb-3 px-3 menu-label">Main Menu</small>

        <nav class="nav flex-column flex-grow-1">
            <a href="{{ route('admin.dashboard.index') }}"
                class="text-white d-flex align-items-center py-3 px-4 {{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}">
                <i class="bi bi-grid-fill me-3 fs-5"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.violations-management.index') }}"
                class="text-white d-flex align-items-center py-3 px-4 {{ request()->routeIs('admin.violations-management.index') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text-fill me-3 fs-5"></i>
                <span>Violations</span>
            </a>

            <a href="{{ route('admin.sanction') }}"
                class="text-white d-flex align-items-center py-3 px-4 {{ request()->routeIs('admin.sanction') ? 'active' : '' }}">
                <i class="bi bi-award me-3 fs-5"></i>
                <span>Sanctions</span>
            </a>

            <a href="{{ route('admin.appeals.index') }}"
                class="text-white d-flex align-items-center py-3 px-4 {{ request()->routeIs('admin.appeals.*') ? 'active' : '' }}">
                <i class="bi bi-envelope-paper-fill me-3 fs-5"></i>
                <span>Appeals</span>
            </a>
        </nav>
    </div>
</div>