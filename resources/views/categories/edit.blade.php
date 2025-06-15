@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-black">Redaguoti kategoriją</h1>

    @if ($errors->any())
        <div class="text-red-600 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-black">Pavadinimas:</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $category->name) }}"
                required
                class="border rounded p-2 w-full text-black dark:text-black"
            >
        </div>

        <div>
            <label for="type" class="block text-black">Tipas:</label>
            <select
                id="type"
                name="type"
                required
                class="border rounded p-2 w-full text-black dark:text-black"
            >
                <option value="income" {{ old('type', $category->type) == 'income' ? 'selected' : '' }}>
                    Pajamos
                </option>
                <option value="expense" {{ old('type', $category->type) == 'expense' ? 'selected' : '' }}>
                    Išlaidos
                </option>
            </select>
        </div>

        <button
            type="submit"
            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded"
        >
            Atnaujinti
        </button>
    </form>

    <p class="mt-4">
        <a href="{{ route('categories.index') }}" class="text-blue-500 hover:underline">
            Atgal į sąrašą
        </a>
    </p>
</div>
@endsection
