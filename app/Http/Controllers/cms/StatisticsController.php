<?php

namespace App\Http\Controllers\cms;

use App\Models\User;
use App\Models\Transaction;
use App\Models\Subscription;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function index()
    {
        $users = User::count();
        $activeSubscriptions = Subscription::where('is_active', 1)->where('end_date', '>', now())->count();
        // dd($activeSubscriptions);
        $transactionAmount = Transaction::whereStatus('completed')->sum('amount');
        return view('backend.statistics.index', compact('users', 'activeSubscriptions', 'transactionAmount'));
    }
}
