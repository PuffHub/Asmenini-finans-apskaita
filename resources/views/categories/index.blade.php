@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kategorijos</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('categories.create') }}">+ Nauja kategorija</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 20px; width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pavadinimas</th>
                <th>Tipas</th>
                <th>Veiksmai</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ ucfirst($category->type) }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}">Redaguoti</a> | 
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline" onsubmit="return confirm('Ar tikrai ištrinti?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">Ištrinti</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Kategorijų nėra</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
