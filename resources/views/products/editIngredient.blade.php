

@extends('layouts.app')

@section('content')
    <h1>Edit Ingredient</h1>

    <form action="{{ route('products.updateIngredient', ['id' => $ingredient->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="ingredient-naam">Ingredient Name:</label>
        <input type="text" name="ingredient-naam" id="ingredient-naam" value="{{ $ingredient->{'ingredient-naam'} }}">

        <label for="unit">Unit:</label>
        <select name="unit" id="unit">
            @foreach ($units as $unit)
                <option value="{{ $unit->id }}" {{ $ingredient->unit_id == $unit->id ? 'selected' : '' }}>
                    {{ $unit->quantity }} {{ $unit->unit }}
                </option>
            @endforeach
        </select>

        <label for="prijs">Price:</label>
        <input type="number" name="prijs" id="prijs" step="0.01" value="{{ $ingredient->prijs }}">

        <input type="submit" value="Update Ingredient">
    </form>

    <form action="{{ route('products.removeIngredient', ['id' => $ingredient->id]) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit">Remove Ingredient</button>
</form>
@endsection