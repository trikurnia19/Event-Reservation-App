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
                <form method="POST" action="{{ route('checkin.public') }}" class="mt-6 space-y-3">
                    @csrf

                    <label for="ticket_code" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Enter Your Ticket Code
                    </label>
                    <input type="text" id="ticket_code" name="ticket_code"
                        class="w-full p-2 border rounded text-gray-900" required>

                    <button type="submit"
                        class="w-full mt-2 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                        Check-in
                    </button>
                </form>
                @if (session('success'))
                    <div class="mt-4 text-green-700 bg-green-100 p-3 rounded">
                        <p>{{ session('success') }}</p>

                        @if (session('ticket_code'))
                            <p class="font-semibold mt-2">Your Ticket Code: {{ session('ticket_code') }}</p>
                        @endif
                    </div>
                @endif

                @if (session('error'))
                    <div class="mt-4 text-red-700 bg-red-100 p-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif



            </div>
        </div>
    </div>
</body>

</html>