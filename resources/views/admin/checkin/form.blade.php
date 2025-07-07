<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            🎫 Check-in Ticket
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-6">

                @if (session('error'))
                    <div class="text-sm text-red-600 font-semibold bg-red-50 border border-red-200 p-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('admin.checkin.process') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="ticket_code" class="block text-sm font-medium text-gray-700 mb-1">
                            Enter Ticket Code
                        </label>
                        <input type="text" id="ticket_code" name="ticket_code" class="form-input w-full" required
                            autofocus>
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>🔍 Search</x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>