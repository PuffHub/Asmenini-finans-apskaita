@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pridėti naują kategoriją</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Pavadinimas:</label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div style="margin-top: 10px;">
            <label for="type">Tipas:</label><br>
            <select id="type" name="type" required>
                <option value="">Pasirinkite tipą</option>
                <option value="income" {{ old('type') == 'income' ? 'selected' : '' }}>Pajamos</option>
                <option value="expense" {{ old('type') == 'expense' ? 'selected' : '' }}>Išlaidos</option>
            </select>
        </div>

        <button type="submit" style="margin-top: 15px;">Išsaugoti</button>
    </form>

    <p><a href="{{ route('categories.index') }}">Atgal į sąrašą</a></p>
</div>
@endsection