@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">{{ $pizza->{'pizza-naam'} }} Details</h1>

        <!-- Voeg hier de details van de pizza toe -->
        <p>Ingrediënten: {{ $pizza->ingredients }}</p>
        <p>Prijs: {{ $pizza->price }}</p>

        <!-- Voeg andere details van de pizza toe indien nodig -->

        <a href="{{ route('products.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md inline-block mt-2">Terug naar overzicht</a>
    </div>
@endsection