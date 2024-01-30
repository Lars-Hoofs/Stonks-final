@extends('layouts.app')

@section('content')

<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md p-6">
        <form action="{{ route('products.storeUnit') }}" method="POST">
            @csrf
            @method('POST')
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="mt-1 p-2 border rounded-md w-full">

            <label for="unit" class="block text-sm font-medium text-gray-700 mt-4">Unit:</label>
            <select name="unit" id="unit" class="mt-1 p-2 border rounded-md w-full">
                <option value="g">g</option>
                <option value="stuks">stuks</option>
            </select>

            <input type="submit" value="Add Unit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
        </form>
    </div>

    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md p-6">
        <form action="{{ route('products.storeIngredient') }}" method="POST">
            @csrf

            <label for="ingredient-naam" class="block text-sm font-medium text-gray-700">Ingredient Name:</label>
            <input type="text" name="ingredient-naam" id="ingredient-naam" class="mt-1 p-2 border rounded-md w-full">

            <label for="unit" class="block text-sm font-medium text-gray-700 mt-4">Unit:</label>
            <select name="unit" id="unit" class="mt-1 p-2 border rounded-md w-full">
                @foreach ($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->quantity }} {{ $unit->unit }} </option>
                @endforeach
            </select>

            <label for="prijs" class="block text-sm font-medium text-gray-700 mt-4">Price:</label>
            <input type="number" name="prijs" id="prijs" step="0.01" class="mt-1 p-2 border rounded-md w-full">

            <input type="submit" value="Add Ingredient" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
        </form>
    </div>

    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md p-6">
        <form action="{{ route('products.storePizza') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="pizza-naam" class="block text-sm font-medium text-gray-700">Pizza Name:</label>
            <input type="text" name="pizza-naam" id="pizza-naam" class="mt-1 p-2 border rounded-md w-full">

            <label for="plaatje" class="block text-sm font-medium text-gray-700 mt-4">Image:</label>
            <input type="text" name="plaatje" id="plaatje" class="mt-1 p-2 border rounded-md w-full">

            <label for="ingredient" class="block text-sm font-medium text-gray-700 mt-4">Ingredients:</label>
            <select name="ingredient[]" id="ingredient" multiple class="mt-1 p-2 border rounded-md w-full">
                @foreach ($ingredients as $ingredient)
                    <option value="{{ $ingredient->id }}">{{ $ingredient->{'ingredient-naam'} }}</option>
                @endforeach
            </select>

            <input type="submit" value="Add Pizza" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
        </form>
    </div>
</section>

@endsection