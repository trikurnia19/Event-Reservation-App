<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            📄 Event Detail
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-6">

                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $event->name }}</h3>
                    <p class="text-gray-600">{{ $event->description }}</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-700">
                    <div>
                        <span class="font-medium text-gray-800">📅 Date & Time:</span><br>
                        {{ \Carbon\Carbon::parse($event->event_datetime)->format('d M Y, H:i') }}
                    </div>

                    <div>
                        <span class="font-medium text-gray-800">👥 Quota:</span><br>
                        {{ $event->quota }}
                    </div>
                </div>

                <div class="flex justify-end gap-4 pt-6">
                    <a href="{{ route('admin.events.edit', $event->id) }}">
                        <x-primary-button class="bg-yellow-500 hover:bg-yellow-600">
                            ✏️ Edit
                        </x-primary-button>
                    </a>
                    <a href="{{ route('admin.events.index') }}"
                        class="inline-flex items-center text-sm text-gray-600 hover:underline">
                        ← Back to Event List
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>