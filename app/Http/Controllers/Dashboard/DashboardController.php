<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $submissionYear = [];
        $submissionMonth = [];

        $months = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'Mei',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Agu',
            9 => 'Sep',
            10 => 'Okt',
            11 => 'Nov',
            12 => 'Des'
        ];
        $weeks = [
            'Minggu 1' => [Carbon::create($currentYear, $currentMonth, 1), Carbon::create($currentYear, $currentMonth, 7)],
            'Minggu 2' => [Carbon::create($currentYear, $currentMonth, 8), Carbon::create($currentYear, $currentMonth, 14)],
            'Minggu 3' => [Carbon::create($currentYear, $currentMonth, 15), Carbon::create($currentYear, $currentMonth, 21)],
            'Minggu 4' => [Carbon::create($currentYear, $currentMonth, 22), Carbon::create($currentYear, $currentMonth, Carbon::create($currentYear, $currentMonth)->endOfMonth()->day)],
        ];

        // Submission per bulan tahun ini
        $submissionYearValue = Submission::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'month');

        foreach ($months as $monthNumber => $monthName) {
            $submissionYear[$monthName] = $submissionYearValue[$monthNumber] ?? 0;
        }

        // Submission mingguan bulan ini
        foreach ($weeks as $label => [$start, $end]) {
            $count = Submission::whereBetween('created_at', [$start->startOfDay(), $end->endOfDay()])->count();
            $submissionMonth[$label] = $count;
        }

        // Submission per kategori
        $submissionCategory = Category::withCount('submissions')
            ->get()
            ->mapWithKeys(function ($category) {
                return [$category->name => $category->submissions_count];
            });

        // Statistik jumlah user
        $totalStudent = User::whereNotNull('student_id')->count();
        $totalAdmin = User::whereNotNull('admin_id')->count();
        $totalOperator = User::whereNotNull('operator_id')->count();

        $totalSubmission = Submission::count();
        $totalSubmissionApproved = Submission::where('status', 'approved')->count();
        $totalSubmissionRejected = Submission::where('status', 'rejected')->count();

        // Submission per bulan per status
        $submissionByStatusPerMonth = Submission::selectRaw('MONTH(created_at) as month, status, COUNT(*) as total')
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'), 'status')
            ->get();

        $submissionStatusPerMonth = [];
        foreach ($months as $monthNumber => $monthName) {
            $submissionStatusPerMonth[$monthName] = [
                'approved' => 0,
                'rejected' => 0,
                'pending' => 0,
            ];
        }

        foreach ($submissionByStatusPerMonth as $row) {
            $monthName = $months[$row->month];
            $submissionStatusPerMonth[$monthName][$row->status] = $row->total;
        }

        // Pertambahan user per bulan
        $userByMonth = User::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'month');

        $userPerMonth = [];
        foreach ($months as $monthNumber => $monthName) {
            $userPerMonth[$monthName] = $userByMonth[$monthNumber] ?? 0;
        }

        return view('dashboard.index', [
            'title' => 'Halaman Dashboard',
            'submission_year' => $submissionYear,
            'submission_month' => $submissionMonth,
            'submission_category' => $submissionCategory,
            'categories' => Category::all(),

            'total_student' => $totalStudent,
            'total_admin' => $totalAdmin,
            'total_operator' => $totalOperator,

            'total_submission' => $totalSubmission,
            'total_submission_approved' => $totalSubmissionApproved,
            'total_submission_rejected' => $totalSubmissionRejected,

            'submission_status_per_month' => $submissionStatusPerMonth,
            'user_per_month' => $userPerMonth,
        ]);
    }
}
