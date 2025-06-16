<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();


        $totalIncome  = Transaction::where('user_id', $userId)
                                   ->where('type', 'income')
                                   ->sum('amount');

        $totalExpense = Transaction::where('user_id', $userId)
                                   ->where('type', 'expense')
                                   ->sum('amount');

        $balance = $totalIncome - $totalExpense;

  
        return view('dashboard', compact('totalIncome', 'totalExpense', 'balance'));
    }
}
