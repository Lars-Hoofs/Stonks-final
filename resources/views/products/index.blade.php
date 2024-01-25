@extends('layouts.app') <!-- Make sure this matches your layout file -->

@section('content')
    <h1 class="text-4xl font-bold mb-8">Alle Pizza's</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($pizzas as $pizza)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">{{ $pizza->pizza_naam }}</h2>
                <img src="{{ $pizza->plaatje }}" alt="{{ $pizza->pizza_naam }} afbeelding" class="w-full h-32 w-32 object-cover mb-4">

                {{-- Add other pizza details if needed --}}
                {{-- Example: --}}
                {{-- <p class="text-gray-700">{{ $pizza->description }}</p> --}}
            </div>
        @endforeach
    </div>
@endsection