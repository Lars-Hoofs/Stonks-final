@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold mb-8">Alle Pizza's</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($pizzas as $pizza)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
                <a href="{{ route('products.show', ['id' => $pizza->id]) }}">
                    <img class="mx-auto mt-4 mb-2 rounded-lg" src="{{ $pizza->plaatje }}" alt="{{ $pizza->pizza_naam }} afbeelding" />
                </a>
                <div class="p-5 flex flex-col justify-between">
                    <a href="{{ route('products.show', ['id' => $pizza->id]) }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $pizza->pizza_naam }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Prijs: €{{ number_format($pizza->calculatePrice(), 2) }}</p>
                    <a href="{{ route('products.show', ['id' => $pizza->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Bekijk details
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection