@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-black">Dashboard</h1>
        <p class="mb-6 text-black">Sveikas, {{ Auth::user()->name }}! Tu esi prisijungęs.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="p-4 bg-green-100 rounded-lg">
                <h2 class="text-lg font-semibold text-black">💰 Pajamos</h2>
                <p class="text-xl font-bold text-black">€{{ number_format($totalIncome, 2) }}</p>
            </div>
            <div class="p-4 bg-red-100 rounded-lg">
                <h2 class="text-lg font-semibold text-black">💸 Išlaidos</h2>
                <p class="text-xl font-bold text-black">€{{ number_format($totalExpense, 2) }}</p>
            </div>
            <div class="p-4 bg-blue-100 rounded-lg">
                <h2 class="text-lg font-semibold text-black">🏦 Likutis</h2>
                <p class="text-xl font-bold text-black">€{{ number_format($balance, 2) }}</p>
            </div>
        </div>

        <div class="space-x-4">
            <a href="{{ route('categories.index') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md font-semibold">
                📂 Kategorijos
            </a>
            <a href="{{ route('transactions.index') }}"
               class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md font-semibold">
                💸 Transakcijos
            </a>
           <a href="{{ route('reports.index') }}"
       class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md font-semibold">
        📊 Ataskaita
    </a>
        </div>
    </div>
</div>
@endsection
