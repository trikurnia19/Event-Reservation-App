<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            ✏️ Edit Event
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.events.update', $event->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="name" value="Event Name" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            value="{{ old('name', $event->name) }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="description" value="Description" />
                        <x-textarea id="description" name="description" rows="4" class="mt-1 block w-full"
                            required>{{ old('description', $event->description) }}</x-textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <x-input-label for="event_datetime" value="Event Date & Time" />
                        <x-text-input id="event_datetime" name="event_datetime" type="datetime-local"
                            class="mt-1 block w-full"
                            value="{{ old('event_datetime', \Carbon\Carbon::parse($event->event_datetime)->format('Y-m-d\TH:i')) }}"
                            required />
                        <x-input-error class="mt-2" :messages="$errors->get('event_datetime')" />
                    </div>

                    <div>
                        <x-input-label for="quota" value="Quota" />
                        <x-text-input id="quota" name="quota" type="number" class="mt-1 block w-full"
                            value="{{ old('quota', $event->quota) }}" required />
                        <x-input-error class="mt-2" :messages="$errors->get('quota')" />
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('admin.events.index') }}" class="text-gray-600 hover:underline">Cancel</a>

                        <x-primary-button class="bg-yellow-500 hover:bg-yellow-600">
                            Update Event
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>