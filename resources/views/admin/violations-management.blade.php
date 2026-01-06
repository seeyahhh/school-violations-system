<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Violations Management</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background-color: #f8f9fa; margin: 0; overflow-x: hidden; font-family: sans-serif;">

    <div id="sidebar-wrapper" style="position: fixed; top: 0; left: 0; height: 100%; width: 260px; background-color: #800000; color: white; transform: translateX(-100%); transition: transform 0.3s ease-in-out; z-index: 1050; box-shadow: 2px 0 5px rgba(0,0,0,0.2); display: flex; flex-direction: column;">

        <div style="padding: 1.5rem 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.1);">
            <div class="fw-bold" style="font-size: 1.4rem;">PUP GABAY</div>
            <div style="font-size: 0.8rem; font-weight: normal; opacity: 0.8;">Violations & Sanctions</div>
        </div>

        <div style="display: flex; flex-direction: column; padding-top: 1rem;">

            <a href="#" style="text-decoration: none; padding: 12px 25px; color: rgba(255, 255, 255, 0.7); display: flex; align-items: center; transition: 0.2s; margin: 5px 15px; border-radius: 50px;">
                <i class="bi bi-house-door" style="font-size: 1.2rem; margin-right: 15px;"></i>
                Home
            </a>

            <a href="#" style="text-decoration: none; padding: 12px 25px; background-color: rgba(255, 255, 255, 0.25); color: #fff; font-weight: bold; display: flex; align-items: center; margin: 5px 15px; border-radius: 50px;">
                <i class="bi bi-file-text" style="font-size: 1.2rem; margin-right: 15px;"></i>
                Violations
            </a>

            <a href="#" style="text-decoration: none; padding: 12px 25px; color: rgba(255, 255, 255, 0.7); display: flex; align-items: center; transition: 0.2s; margin: 5px 15px; border-radius: 50px;">
                <i class="bi bi-award" style="font-size: 1.2rem; margin-right: 15px;"></i>
                Sanctions
            </a>

        </div>

        <div style="margin-top: auto; padding: 20px;">
            <button id="closeSidebar" class="btn btn-sm btn-outline-light w-100">Close Menu</button>
        </div>
    </div>
    <nav class="navbar navbar-dark mb-2 shadow-sm" style="background-color: #ffffff; border-bottom: 6px solid #b22222; position: relative; z-index: 1000;">
        <div class="container-fluid px-4 d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center">
                <i class="bi bi-list me-3" id="sidebarToggle" style="font-size: 2rem; color: #800000; cursor: pointer;"></i>
                <div>
                    <h5 class="mb-0 fw-bold" style="color: #800000;">Violations Management</h5>
                    <small class="text-muted">View and manage all violation records</small>
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

    <div class="container-fluid p-4">
        <div class="d-flex flex-wrap justify-content-between mb-3 gap-2">
            <div class="d-flex gap-2" style="flex: 1; max-width: 600px;">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control border-start-0 ps-0" placeholder="Search by student name, ID, or case ID...">
                </div>
                <select class="form-select" style="max-width: 150px;">
                    <option selected>All status</option>
                    <option value="1">Pending</option>
                    <option value="2">Under Review</option>
                    <option value="3">Resolved</option>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-secondary d-flex align-items-center gap-2" style="color: #800000; border-color: #800000;">
                    <i class="bi bi-download"></i> Export CSV
                </button>
            </div>
        </div>

        <div class="row g-3">
            @foreach ($violationRecords as $record)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="card border-0 h-100" style="box-shadow: 0 2px 8px rgba(0,0,0,0.05); border-radius: 8px;">
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="fw-bold" style="color: #800000;">
                                V-2026-{{ str_pad($record->id, 3, '0', STR_PAD_LEFT) }}
                            </span>

                            @if($record->status_id == 1)
                            <span class="badge bg-warning text-dark rounded-1" style="font-size: 11px; padding: 6px 10px;">PENDING</span>
                            @elseif($record->status_id == 2)
                            <span class="badge bg-info text-white rounded-1" style="font-size: 11px; padding: 6px 10px;">UNDER REVIEW</span>
                            @elseif($record->status_id == 3)
                            <span class="badge bg-success text-white rounded-1" style="font-size: 11px; padding: 6px 10px;">RESOLVED</span>
                            @else
                            <span class="badge bg-secondary text-white rounded-1" style="font-size: 11px; padding: 6px 10px;">UNKNOWN</span>
                            @endif
                        </div>

                        <h6 class="fw-bold mb-1">User ID: {{ $record->user_id }}</h6>
                        <p class="text-muted small mb-3">
                            Student No: 202X-{{ $record->user_id }}XXXX-MN-0
                        </p>

                        <div class="mb-3">
                            <span class="d-block fw-bold" style="font-size: 14px;">
                                Violation Code: {{ $record->vio_sanct_id }}
                            </span>
                            <small class="text-muted" style="font-size: 12px;">
                                {{ \Carbon\Carbon::parse($record->created_at)->format('Y-m-d') }}
                            </small>
                        </div>

                        <button class="btn w-100 btn-sm fw-bold" style="border: 1px solid #800000; color: #800000; padding: 8px;">
                            <i class="bi bi-eye me-1"></i> View Details
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-4 text-secondary small">
            Showing {{ count($violationRecords) }} violations
        </div>
    </div>

    <script>
        document.getElementById("sidebarToggle").addEventListener("click", function(e) {
            e.preventDefault();
            var sidebar = document.getElementById("sidebar-wrapper");

            if (sidebar.style.transform === "translateX(0%)") {
                sidebar.style.transform = "translateX(-100%)";
            } else {
                sidebar.style.transform = "translateX(0%)";
            }
        });

        document.getElementById("closeSidebar").addEventListener("click", function(e) {
            e.preventDefault();
            document.getElementById("sidebar-wrapper").style.transform = "translateX(-100%)";
        });
    </script>

</body>

</html>