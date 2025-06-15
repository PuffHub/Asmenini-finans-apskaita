@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Redaguoti kategoriją</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Pavadinimas:</label><br>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>
        </div>

        <div style="margin-top: 10px;">
            <label for="type">Tipas:</label><br>
            <select id="type" name="type" required>
                <option value="income" {{ (old('type', $category->type) == 'income') ? 'selected' : '' }}>Pajamos</option>
                <option value="expense" {{ (old('type', $category->type) == 'expense') ? 'selected' : '' }}>Išlaidos</option>
            </select>
        </div>

        <button type="submit" style="margin-top: 15px;">Atnaujinti</button>
    </form>

    <p><a href="{{ route('categories.index') }}">Atgal į sąrašą</a></p>
</div>
@endsection
