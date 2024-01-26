@extends('layouts.app')

@section('content')
    <h1>Edit Unit</h1>

    <form action="{{ route('products.updateUnit', ['id' => $unit->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" value="{{ $unit->quantity }}">

        <label for="unit">Unit:</label>
        <select name="unit" id="unit">
            <option value="g" {{ $unit->unit === 'g' ? 'selected' : '' }}>g</option>
            <option value="stuks" {{ $unit->unit === 'stuks' ? 'selected' : '' }}>stuks</option>
        </select>

        <input type="submit" value="Update Unit">

        
    </form>

    <form action="{{ route('products.removeUnit', ['id' => $unit->id]) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Remove Unit</button>
@endsection