<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Rodo visas transakcijas
    public function index()
    {
        $transactions = Transaction::with('category')->orderBy('date', 'desc')->get();
        return view('transactions.index', compact('transactions'));
    }

    // Forma naujai transakcijai sukurti
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('transactions.create', compact('categories'));
    }

    // Naujos transakcijos išsaugojimas
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        Transaction::create($validated);

        return redirect()->route('transactions.index')->with('success', 'Operacija sukurta sėkmingai.');
    }

    // Forma transakcijos redagavimui
    public function edit(Transaction $transaction)
    {
        $categories = Category::orderBy('name')->get();
        return view('transactions.edit', compact('transaction', 'categories'));
    }

    // Transakcijos atnaujinimas
    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        $transaction->update($validated);

        return redirect()->route('transactions.index')->with('success', 'Operacija atnaujinta sėkmingai.');
    }

    // Transakcijos šalinimas
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Operacija ištrinta sėkmingai.');
    }
}
