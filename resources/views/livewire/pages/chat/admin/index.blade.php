<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>
<div class="py-12" x-init="Echo.join('online.presence.{{ auth()->id() }}')">
    <div class="max-w-[99%] mx-auto sm:px-6 lg:px-8 grid grid-cols-12 gap-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-3 p-4">
            Users
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-9 p-4">
            Messages
        </div>
    </div>
</div>
