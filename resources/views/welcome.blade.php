<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'EventReservApp') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')

    @vite('resources/js/app.js')
</head>

<body class="antialiased bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="text-center space-y-6">
            <h1 class="text-4xl font-bold">
                Welcome to <span class="text-blue-600">{{ config('app.name') }}</span>
            </h1>
            <p class="text-lg">
                Please register first to use this App
            </p>

            <div class="space-x-4">
                @auth
                    <a href="{{ route('visitor.dashboard') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</body>

</html>