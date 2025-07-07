<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            🎟️ Check-in Result
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">

                <div>
                    <h3 class="text-lg font-bold text-gray-800 mb-1">
                        {{ $reservation->event->name }}
                    </h3>
                    <p class="text-gray-600 text-sm">
                        Ticket for: <strong>{{ $reservation->user->name }}</strong>
                        ({{ $reservation->user->email }})<br>
                        Ticket Code: <span class="font-semibold">{{ $reservation->ticket_code }}</span><br>
                        Status:
                        @if ($reservation->is_checked_in)
                            <span class="text-green-600 font-semibold">✔ Already Checked-in</span>
                        @else
                            <span class="text-yellow-600 font-semibold">❗ Not Yet Checked-in</span>
                        @endif
                    </p>
                </div>

                @if (!$reservation->is_checked_in)
                    <form action="{{ route('checkin.mark', $reservation->id) }}" method="POST" class="mt-4">
                        @csrf
                        <x-primary-button class="bg-green-600 hover:bg-green-700">
                            ✅ Mark as Checked-in
                        </x-primary-button>
                    </form>
                @endif

                <div class="mt-6">
                    <a href="{{ route('admin.checkin.form') }}" class="text-blue-600 hover:underline text-sm">
                        ← Back to Check-in
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>