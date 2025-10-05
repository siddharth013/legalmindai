<?php

namespace App\Http\Controllers;

use App\Models\CaseModel;
use App\Models\NextAction;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $statusCounts = CaseModel::select('status', DB::raw('count(*) as total'))
                        ->groupBy('status')
                        ->pluck('total', 'status')
                        ->toArray();

        $upcomingActions = NextAction::where('action_date', '>=', now()->toDateString())
                           ->orderBy('action_date')
                           ->limit(5)
                           ->get();

        return view('admin.dashboard', compact('statusCounts', 'upcomingActions'));
    }
}
