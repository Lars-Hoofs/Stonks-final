@extends('layouts.app')

@section('content')

<div class="container mx-auto p-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    <h1 class="text-3xl font-bold mb-6">Pizza's</h1>

    @foreach($pizzas as $pizza)
        <div class="bg-white rounded-lg overflow-hidden shadow-md mb-4">
            <h2 class="text-xl font-bold p-4">{{ $pizza->{'pizza-naam'} }}</h2>
            <img src="{{ $pizza->plaatje }}" alt="{{ $pizza->{'pizza-naam'} }} Image" class="w-full h-auto">
            
            <!-- Knop voor show functionaliteit -->
            <a href="{{ route('products.show', ['pizza' => $pizza->id]) }}" class="bg-blue-500 text-white py-2 px-4 rounded-md inline-block mt-2">Toon details</a>
        </div>
    @endforeach
</div>

@endsection