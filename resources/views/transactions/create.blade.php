@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pridėti naują transakciją</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 10px;">
            <label>Kategorija:</label><br>
            <select name="category_id" required>
                <option value="">-- Pasirinkti --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }} ({{ $category->type }})</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Tipas:</label><br>
            <select name="type" required>
                <option value="">-- Pasirinkti --</option>
                <option value="income">Pajamos</option>
                <option value="expense">Išlaidos</option>
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Suma:</label><br>
            <input type="number" name="amount" step="0.01" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Data:</label><br>
            <input type="date" name="date" required>
        </div>

        <button type="submit">💾 Išsaugoti</button>
    </form>
</div>
@endsection
