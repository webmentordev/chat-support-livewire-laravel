<div class="h-[460px] border border-gray-200 rounded-xl w-full mb-4 overflow-y-scroll px-4 py-3">
    <div class="space-y-4 pb-4 sm:[overflow-anchor:none]">
        @foreach ($messages as $message)
            <livewire:components.message :message="$message" :key="$message->id" />
        @endforeach
    </div>
    <div class="sm:[overflow-anchor:auto] h-px" x-init="$el.scrollIntoView()"></div>
</div>
