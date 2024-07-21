<div class="h-screen flex items-center justify-center w-full" x-data="{ message: '' }">
    <div class="p-6 rounded-xl bg-white max-w-3xl w-full h-[600px]">
        <div class="flex items-center justify-between mb-3">
            @if ($online == true)
                <div class="flex items-center">
                    <h3 class="text-gray-700 font-bold flex items-center">
                        Support is Online
                    </h3>
                    <img src="https://api.iconify.design/ci:dot-02-s.svg?color=%231ee675" alt="Online dot">
                </div>
            @else
                <div class="flex items-center">
                    <h3 class="text-gray-700 font-bold flex items-center">
                        Support is Offline
                    </h3>
                    <img src="https://api.iconify.design/ci:dot-02-s.svg?color=%23f71936" alt="Offline dot">
                </div>
            @endif
            {{ $online }}
            <form wire:submit="endRoomChat">
                <button type="submit" class="py-2 px-3 bg-red-600 text-white font-bold text-sm rounded-lg">End
                    Chat</button>
            </form>
        </div>
        <livewire:components.messages :room="$room" />
        <div class="h-fit">
            <form wire:submit.prevent="sendMessage" class="flex items-center">
                <input type="text" wire:model="message" x-model="message" x-on:keyup.enter="message = ''"
                    class="p-2 px-3 rounded-full w-full bg-gray-100 text-black border border-gray-200 placeholder:text-gray-500"
                    placeholder="Write message...">
                <button type="submit" x-on:click="message = ''" class="bg-gray-700 p-3 rounded-full ml-2">
                    <img src="https://api.iconify.design/material-symbols:send.svg?color=%23ffffff" alt="Send icon"
                        width="22">
                </button>
            </form>
        </div>
    </div>
</div>
