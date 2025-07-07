<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            🛠️ Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-1">
                    <h3 class="text-xl font-semibold">Welcome, {{ Auth::user()->name }}</h3>
                    <p class="text-sm text-gray-500">
                        Here is a quick overview of the latest events and reservations.
                    </p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-lg font-semibold text-gray-800">📅 Events Summary</h4>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.events.create') }}">
                                <x-primary-button>Create Event</x-primary-button>
                            </a>
                            <a href="{{ route('admin.checkin.form') }}">
                                <x-secondary-button>Go to Check-in</x-secondary-button>
                            </a>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50 text-xs text-gray-600 uppercase">
                                <tr>
                                    <th class="px-4 py-3 text-left">Event Name</th>
                                    <th class="px-4 py-3 text-left">Date</th>
                                    <th class="px-4 py-3 text-left">Quota</th>
                                    <th class="px-4 py-3 text-left">Reservations</th>
                                    <th class="px-4 py-3 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($events as $event)
                                    <tr>
                                        <td class="px-4 py-3 font-medium text-gray-800">{{ $event->name }}</td>
                                        <td class="px-4 py-3">
                                            {{ optional($event->datetime)->format('d M Y H:i') ?? '-' }}
                                        </td>
                                        <td class="px-4 py-3">{{ $event->quota }}</td>
                                        <td class="px-4 py-3">{{ $event->reservations_count }}</td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('admin.events.show', $event->id) }}"
                                                class="text-blue-600 hover:underline">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">No events found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">🧾 Latest Reservations</h4>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50 text-xs text-gray-600 uppercase">
                                <tr>
                                    <th class="px-4 py-3 text-left">Visitor</th>
                                    <th class="px-4 py-3 text-left">Event</th>
                                    <th class="px-4 py-3 text-left">Ticket Code</th>
                                    <th class="px-4 py-3 text-left">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($recentReservations as $r)
                                    <tr>
                                        <td class="px-4 py-3">
                                            <div class="font-medium text-gray-800">{{ $r->user->name }}</div>
                                            <div class="text-gray-400 text-xs">{{ $r->user->email }}</div>
                                        </td>
                                        <td class="px-4 py-3">{{ $r->event->name }}</td>
                                        <td class="px-4 py-3">{{ $r->ticket_code }}</td>
                                        <td class="px-4 py-3">
                                            @if ($r->is_checked_in)
                                                <span class="text-green-600 font-medium">Checked-in</span>
                                            @else
                                                <span class="text-yellow-600 font-medium">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-4 text-center text-gray-500">No reservations yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>