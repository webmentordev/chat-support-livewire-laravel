<div class="fixed right-3 bottom-3 z-50 " x-data="{ open: false }">
    <div class="bg-black rounded-full p-2 w-fit cursor-pointer" x-show="!open" x-cloak x-on:click="open = true">
        <img src="https://api.iconify.design/ic:sharp-wechat.svg?color=%23FFFFFF" alt="Chat icon" width="40">
    </div>
    <div class="w-[300px] h-[500px] bg-white rounded-2xl px-3 py-2 shadow-lg" x-show="open" x-cloak>
        <div class="w-full flex justify-between mr-6 pb-3 border-b border-gray-200">
            <h2 class="text-black font-semibold">Live Chat</h2>
            <img src="https://api.iconify.design/maki:cross-11.svg?color=%23dd3c3c" alt="Close Icon" width="15"
                class="cursor-pointer" x-on:click="open = false">
        </div>
        <div class="mt-5 px-2">
            <form wire:submit="createChatRoom">
                <div class="w-full mb-2">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email" class="block mt-1 w-full" wire:model="email" type="email" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="w-full mb-2">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" wire:model="name" type="text" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="w-full mb-2">
                    <x-input-label for="subject" :value="__('Subject')" />
                    <x-text-input id="subject" class="block mt-1 w-full" wire:model="subject" type="text"
                        required />
                    <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                </div>
                <div class="w-full mb-2">
                    <x-input-label for="message" :value="__('Message')" />
                    <x-textarea id="message" class="block mt-1 w-full" wire:model="message" type="text" required />
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                </div>
                <button class="bg-black text-white py-2 px-3 inline-block rounded-xl" type="submit">Send
                    Message</button>
            </form>
        </div>
    </div>
</div>
