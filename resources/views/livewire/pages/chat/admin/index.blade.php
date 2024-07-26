<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Chat Support') }}
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-[99%] mx-auto sm:px-6 lg:px-8">
        <div x-data="{ enabled: false }" x-init="Echo.channel('room.created')
            .listen('RoomCreated', async (event) => {
                if (enabled) {
                    document.getElementById('audio').play()
                }
            })">
            <audio id="audio" src="{{ asset('sound/message.mp3') }}" allow="autoplay"></audio>
            <button x-on:click="enabled = !enabled" class="p-2 px-3 rounded-md bg-black text-white mb-3">
                <span x-show="enabled" x-cloak>🔔 Notifications enabled</span>
                <span x-show="!enabled" x-cloak>🔔 Enable Notification Sound</span>
            </button>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-9 p-4">
            @foreach ($rooms as $room)
                <div class="bg-gray-100 border-gray-200 border p-3 mb-3 rounded-lg relative">
                    @if ($room->is_active)
                        <span
                            class="absolute bg-green-600 text-white font-semibold p-2 px-3 rounded-lg top-3 right-3">Open</span>
                    @else
                        <span
                            class="absolute bg-red-600 text-white font-semibold p-2 px-3 rounded-lg top-3 right-3">Closed</span>
                    @endif
                    <ul class="flex flex-col">
                        <li><b>Name:</b> {{ $room->name }}</li>
                        <li><b>Email:</b> {{ $room->email }}</li>
                        <li><b>Subject:</b> {{ $room->subject }}</li>
                        <li><b>RoomID:</b> {{ $room->id }}</li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>
