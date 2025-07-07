<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            🎫 My Tickets
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @forelse ($reservations as $reservation)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-2">
                    <h3 class="text-lg font-semibold text-gray-800">
                        {{ $reservation->event->name }}
                    </h3>
                    <p class="text-sm text-gray-600">
                        {{ \Carbon\Carbon::parse($reservation->event->event_datetime)->format('d M Y, H:i') }}
                    </p>

                    <div class="text-sm">
                        <span class="font-semibold text-gray-700">Ticket Code:</span>
                        <span class="ml-2 text-gray-800">{{ $reservation->ticket_code }}</span>
                    </div>

                    <div class="text-sm">
                        <span class="font-semibold text-gray-700">Status:</span>
                        @if ($reservation->is_checked_in)
                            <span class="ml-2 text-green-600 font-semibold">✔ Already Checked-in</span>
                        @else
                            <span class="ml-2 text-yellow-600 font-semibold">❗ Not Yet Checked-in</span>
                        @endif
                    </div>
                </div>
            @empty
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center text-gray-500">
                    You haven't reserved any event yet.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>