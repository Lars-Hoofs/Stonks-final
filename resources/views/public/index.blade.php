@extends('layouts.app')

@section('content')
<div class="mx-20 h-3/4 rounded-lg bg-cover bg-no-repeat flex justify-center items-center" style="background-image: url('https://images.unsplash.com/photo-1579751626657-72bc17010498?q=80&w=2669&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
    <div class="text-center text-white flex-row">
        <h1 class="text-8xl font-bold">StonksPizza's</h1>
        <p class="text-4xl">De lekkerste & de goedkoopste</p>
        <div class="mt-4 flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>
</div>

<div class="my-5 mx-20">
    <div class="flex justify-between">
        <div class="w-1/3 mb-5">
            <a href="{{ route('products.index') }}">
                <div class="h-lvh bg-red-500 rounded-lg flex justify-center items-center" style="background-image: url('https://images.unsplash.com/photo-1593504049359-74330189a345?q=80&w=2127&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
                    <p class="text-white text-center text-2xl font-bold">Producten</p>
                </div>
            </a>
        </div>
        <div class="w-1/3 mx-5 ml-5">
            <a href="{{ route('public.winkels') }}">
                <div class="h-lvh bg-blue-500 rounded-lg flex justify-center items-center" style="background-image: url('https://images.unsplash.com/photo-1604382355076-af4b0eb60143?q=80&w=1587&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
                    <p class="text-white text-center text-2xl font-bold">Onze Winkels</p>
                </div>
            </a>
        </div>
        <div class="w-1/3 mb-5">
            <a href="{{ route('register') }}">
                <div class="h-lvh bg-green-500 rounded-lg flex justify-center items-center" style="background-image: url('https://images.unsplash.com/photo-1574615552620-54cd32a28519?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzJ8fHBpenphfGVufDB8fDB8fHww');">
                    <p class="text-white text-center text-2xl font-bold">registreer</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
        
