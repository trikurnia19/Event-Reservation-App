<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            👋 Visitor Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">
                <p class="text-lg text-gray-700">Welcome, {{ Auth::user()->name }}!</p>
                <p class="text-sm text-gray-500">Get started by browsing available events or checking your ticket
                    status.</p>

                <div class="flex flex-col sm:flex-row gap-4 pt-2">
                    <a href="{{ route('visitor.events.index') }}">
                        <x-primary-button>📅 Browse Events</x-primary-button>
                    </a>

                    <a href="{{ route('visitor.tickets.my') }}">
                        <x-secondary-button>🎫 My Tickets</x-secondary-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>