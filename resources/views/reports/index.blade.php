@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-xl font-bold mb-4">📊 Ataskaita</h1>

    <form method="GET" action="{{ route('reports.index') }}" class="mb-4 space-x-2">
        <label for="from" class="text-black">Nuo:</label>
        <input type="date" name="from" value="{{ request('from') }}" class="border rounded p-1">

        <label for="to" class="text-black">Iki:</label>
        <input type="date" name="to" value="{{ request('to') }}" class="border rounded p-1">

        <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded">Filtruoti</button>
    </form>

    @if ($summaryByCategory->isNotEmpty())
        <h2 class="text-lg font-semibold mb-2">Suminė pagal kategorijas:</h2>
        <ul class="mb-4">
            @foreach ($summaryByCategory as $category => $data)
                <li class="text-black">
                    <strong>{{ $category }}</strong>: €{{ number_format($data['sum'], 2) }} 
                    ({{ $data['type'] === 'income' ? 'Pajamos' : 'Išlaidos' }})
                </li>
            @endforeach
        </ul>

        <h2 class="text-lg font-semibold mb-2">Statistinė analizė:</h2>
        <ul class="text-black">
            <li>Min suma: €{{ number_format($stats['min'], 2) }}</li>
            <li>Max suma: €{{ number_format($stats['max'], 2) }}</li>
            <li>Vidutinė suma: €{{ number_format($stats['avg'], 2) }}</li>
        </ul>
    @else
        <p class="text-black">Nėra duomenų pasirinktam laikotarpiui.</p>
    @endif
</div>
@endsection
