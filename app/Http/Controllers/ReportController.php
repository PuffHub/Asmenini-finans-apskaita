<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        $query = Transaction::where('user_id', Auth::id());

        if ($from) {
            $query->whereDate('date', '>=', $from);
        }

        if ($to) {
            $query->whereDate('date', '<=', $to);
        }

        $transactions = $query->with('category')->get();

        $summaryByCategory = $transactions->groupBy('category.name')->map(function ($group) {
            return [
                'sum' => $group->sum('amount'),
                'type' => $group->first()->category->type
            ];
        });

        $stats = [
            'min' => $transactions->min('amount'),
            'max' => $transactions->max('amount'),
            'avg' => round($transactions->avg('amount'), 2),
        ];

        return view('reports.index', compact('summaryByCategory', 'from', 'to', 'stats'));
    }
}
