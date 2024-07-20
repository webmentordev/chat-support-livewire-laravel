<div>
    @if ($message->user_id != 0)
        <div class="flex space-x-3 sm:[overflow-anchor:none]">
            <div class="bg-gray-100 border border-gray-200 w-full max-w-[500px] min-w-[200px] rounded-lg py-2 mb-2 px-3">
                <div class="flex items-baseline space-x-2">
                    <div class="font-bold">
                        {{ $message->user->name }}
                    </div>
                    <span class="text-gray-600 text-xs">{{ $message->created_at_human }} UTC</span>
                </div>
                <p>{{ $message->message }}</p>
            </div>
        </div>
    @else
        <div class="flex justify-end space-x-3 sm:[overflow-anchor:none]">
            <div class="bg-blue-50 border border-gray-200 min-w-[200px] max-w-[500px] rounded-lg py-2 px-3 mb-1">
                <div class="flex items-baseline space-x-2">
                    <div class="font-bold">
                        You
                    </div>
                    <span class="text-gray-600 text-xs">{{ $message->created_at_human }} UTC</span>
                </div>
                <p>{{ $message->message }}</p>
            </div>
        </div>
    @endif
</div>
