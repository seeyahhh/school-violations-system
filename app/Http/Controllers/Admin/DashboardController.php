<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\Violation;
use App\Models\ViolationRecord;
use App\Models\Appeal;
use App\Models\User;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

class DashboardController extends Controller
{
    public function index()
    {
        // Summary counts
        $summary = [
            'total_violations' => ViolationRecord::count(),
            'under_review' => ViolationRecord::where('status_id', 1)->count(),
            'pending' => ViolationRecord::where('status_id', 2)->count(),
            'resolved' => ViolationRecord::where('status_id', 3)->count(),
        ];

        $recentViolations = ViolationRecord::with(['user', 'status', 'violationSanction.violation'])
            ->latest()
            ->take(5)
            ->get();

        $recentAppeals = Appeal::with(['violationRecord.user', 'violationRecord.violationSanction.violation'])
            ->latest('updated_at')
            ->take(4)
            ->get();

        $violationsChart = $this->violationsChart();

        return view('admin.dashboard', compact(
            'summary',
            'recentViolations',
            'recentAppeals',
            'violationsChart'
        ));
    }

    private function violationsChart()
    {
        $start = Carbon::now()->subDays(6)->startOfDay();
        $end   = Carbon::now()->endOfDay();

        $period = CarbonPeriod::create($start, $end);

        $violationsPerDay = collect($period)->map(function (Carbon $date) {
            return [
                'date'  => $date->format('M d, Y'),
                'count' => ViolationRecord::whereDate('created_at', $date)->count(),
            ];
        });

        $labels = $violationsPerDay->pluck('date')->toArray();
        $data   = $violationsPerDay->pluck('count')->toArray();

        $violationChart = Chartjs::build()
            ->name('ViolationsLast7Days')
            ->type('bar')
            ->size(['width' => 400, 'height' => 250])
            ->labels($labels)
            ->datasets([
                [
                    'label' => 'Violations',
                    'backgroundColor' => 'rgba(255, 215, 215, 0.4)',
                    'borderColor' => 'rgba(128, 0, 0, 0.75)',
                    'borderWidth' => 1,
                    'data' => $data,
                ],
            ])
            ->options([
                'responsive' => true,

                'animation' => [
                    'duration' => 2000,
                    'easing' => 'easeOutQuart',
                ],

                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                        'grid' => [
                            'color' => 'rgba(0,0,0,0.05)',
                        ],
                    ],
                    'x' => [
                        'grid' => [
                            'display' => false,
                        ],
                    ],
                ],

                'plugins' => [
                    'legend' => [
                        'display' => false,
                    ],
                ],
            ]);
        return $violationChart;
    }
}
