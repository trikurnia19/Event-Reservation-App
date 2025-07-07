<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            🎟️ Available Events
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @forelse ($events as $event)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-1">{{ $event->name }}</h3>
                    <p class="text-gray-600 mb-2">{{ $event->description }}</p>

                    <div class="text-sm text-gray-500 mb-1">
                        📅 {{ \Carbon\Carbon::parse($event->event_datetime)->format('d M Y, H:i') }}
                    </div>
                    <div class="text-sm text-gray-500 mb-4">
                        Quota: {{ $event->reservations_count }} / {{ $event->quota }}
                    </div>

                    @if ($event->reservations_count < $event->quota)
                        <form action="{{ route('visitor.events.reserve', $event->id) }}" method="POST">
                            @csrf
                            <x-primary-button>
                                ➕ Reserve Ticket
                            </x-primary-button>
                        </form>
                    @else
                        <div class="text-red-600 font-semibold">
                            🚫 Fully Booked
                        </div>
                    @endif
                </div>
            @empty
                <div class="text-center text-gray-500">No events available.</div>
            @endforelse
        </div>
    </div>
</x-app-layout>