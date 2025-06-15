@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Transakcijos</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('transactions.create') }}">+ Nauja transakcija</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 20px; width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kategorija</th>
                <th>Suma</th>
                <th>Data</th>
                <th>Veiksmai</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->category->name ?? 'Be kategorijos' }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->date }}</td>
                    <td>
                        <a href="{{ route('transactions.edit', $transaction) }}">Redaguoti</a> |
                        <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" style="display:inline" onsubmit="return confirm('Ištrinti?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">Ištrinti</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Nėra transakcijų</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
