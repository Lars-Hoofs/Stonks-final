@extends('layouts.app')

@section('content')
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md mx-auto">
        <a href="#">
            <img class="rounded-t-lg w-full h-48 object-cover" src="{{ $pizza->plaatje }}" alt="{{ $pizza->pizza_naam }} afbeelding" />
        </a>
        <div class="p-6">
            <a href="#">
                <h1 class="text-4xl font-bold mb-2">{{ $pizza->pizza_naam }}</h1>
            </a>

            <h2 class="text-xl font-semibold mt-4 mb-2">Ingrediënten:</h2>
            <div class="for-each">
                @foreach ($pizza->ingredients as $ingredient)
                    <p class="text-gray-700">{{ $ingredient->{'ingredient-naam'} }}</p>
                @endforeach
            </div>

            <p class="text-xl font-semibold mt-4 mb-2">Totale Prijs:</p>
            <p class="text-gray-700">€{{ number_format($pizza->calculatePrice(), 2) }}</p>

            {{-- Add button --}}
            <form action="{{ route('add_to_cart', ['pizzaId' => $pizza->id]) }}" method="post">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Voeg toe aan winkelwagen</button>
            </form>
        </div>
    </div>
@endsection