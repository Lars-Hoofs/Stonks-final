@extends('layouts.app')

@section('content')
    <div class=" p-6 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold mb-8">Winkelwagen</h1>

        @if ($cartItems->isEmpty())
            <p>Je winkelwagen is leeg.</p>
        @else
            <ul>
                @foreach ($cartItems as $cartItem)
                    <li>
                        {{ $cartItem->pizza->pizza_naam }} - Aantal: {{ $cartItem->quantity }}
                        - Totaal Prijs: €{{ number_format($cartItem->total_price, 2) }}
                        <form action="{{ route('cart.remove', ['id' => $cartItem->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-500">Verwijder</button>
                        </form>
                    </li>
                @endforeach
            </ul>

            <form action="{{ route('cart.checkout') }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="bg-blue-500 px-4 py-2 rounded">Betalen</button>
            </form>
        @endif
    </div>

 
@endsection