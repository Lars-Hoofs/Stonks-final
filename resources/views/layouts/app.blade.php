<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased flex flex-col h-screen bg-zinc-300">

    <nav class="fixed bottom-0">
    </nav>

    <div class="container mx-auto">
        <div class="flex justify-center">
            <ul class="font-medium flex flex-col p-4 mt-4 border border-gray-100 rounded-lg  md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 ">
                <li>
                    <a href="{{ route('public.index')}}" class="block py-2 px-3 text-black bg-white rounded md:bg-transparent md:text-black md:p-0">Home</a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" class="block py-2 px-3 text-black rounded hover:bg-white md:hover:bg-transparent md:border-0 md:hover:text-black md:p-0">Producten</a>
                </li>
                <li>
                    <a href="{{ route('public.winkels') }}" class="block py-2 px-3 text-black rounded hover:bg-white md:hover:bg-transparent md:border-0 md:hover:text-black md:p-0">Onze Winkels</a>
                </li>
                <li>
                    <a href="{{ route('cart.index') }}" class="block py-2 px-3 text-black rounded hover:bg-white md:hover:bg-transparent md:border-0 md:hover:text-black md:p-0">Winkel Karretje</a>
                </li>
                <li>
                    @auth
                        <span class="text-gray-700">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('products.index') }}" onclick="event.preventDefault(); this.closest('form').submit();"></a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700">Login</a>
                        <span class="mx-2 text-black">of</span>
                        <a href="{{ route('register') }}" class="text-gray-700">Register</a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
    <div class="main flex-grow">
        @yield('content')
    </div>

    <footer class="bg-white rounded-lg shadow m-4 fixed bottom-0 left-0 right-0">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center">© 2024 <a href="https://flowbite.com/" class="hover:underline">StonksPizzas™</a>. All Rights Reserved.</span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 sm:mt-0">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Home</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="{{ route('public.login') }}" class="hover:underline me-4 md:me-6">Admin paneel</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
    </footer>
</body>
</html>