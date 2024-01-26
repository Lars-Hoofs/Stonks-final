

@extends('layouts.app')

@section('content')
    <h1>Edit Pizza</h1>

    <form action="{{ route('products.updatePizza', ['id' => $pizza->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <label for="pizza-naam">Pizza Name:</label>
        <input type="text" name="pizza-naam" id="pizza-naam" value="{{ $pizza->pizza_naam }}">

        <label for="plaatje">Image:</label>
        <input type="text" name="plaatje" id="plaatje" value="{{ $pizza->plaatje }}">

        <label for="ingredient">Ingredients:</label>
        <select name="ingredient[]" id="ingredient" multiple>
            @foreach ($ingredients as $ingredient)
                <option value="{{ $ingredient->id }}" {{ in_array($ingredient->id, $pizza->ingredients->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $ingredient->{'ingredient-naam'} }}
                </option>
            @endforeach
        </select>

        <input type="submit" value="Update Pizza">
    </form>

    <form action="{{ route('products.removePizza', ['id' => $pizza->id]) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit">Remove Pizza</button>
</form>
@endsection