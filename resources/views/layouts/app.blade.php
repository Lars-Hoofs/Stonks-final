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
<body class="font-sans antialiased">
    <nav class="bg-white">
    </nav>

    <div class="container mx-auto">
        <div class="flex justify-center">
            <ul class="font-medium flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-white md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="" class="block py-2 px-3 text-black bg-white rounded md:bg-transparent md:text-black md:p-0">Home</a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" class="block py-2 px-3 text-black rounded hover:bg-white md:hover:bg-transparent md:border-0 md:hover:text-black md:p-0">Producten</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-black rounded hover:bg-white md:hover:bg-transparent md:border-0 md:hover:text-black md:p-0">Services</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-black rounded hover:bg-white md:hover:bg-transparent md:border-0 md:hover:text-black md:p-0">Contact</a>
                </li>
                <li>
                    @auth
                        <span class="text-gray-700">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('products.index') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700">Login</a>
                        <span class="mx-2 text-black">or</span>
                        <a href="{{ route('register') }}" class="text-gray-700">Register</a>
                    @endauth
                </li>
            </ul>
        </div>
        



        @yield('content')
    </div>
</body>
</html>