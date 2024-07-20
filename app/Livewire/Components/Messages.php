<?php

namespace App\Livewire\Components;

use App\Models\Message as ModelMessage;
use App\Models\Room;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Collection;

class Messages extends Component
{
    public Room $room;
    public Collection $messages;

    #[On("message.sent")]
    public function prependMessages($id)
    {
        $this->messages->push(ModelMessage::with('user')->find($id));
    }

    public function mount()
    {
        $this->fill([
            'messages' => $this->room->messages()->with('user')
                ->oldest()
                ->take(100)
                ->get()
        ]);
    }

    #[On('echo-channel:chat.room.{room.id},MessageCreated')]
    public function prependMessageBroadcast(array $payload)
    {
        $this->prependMessages($payload['id']);
    }

    public function render()
    {
        return view('livewire.components.messages', []);
    }
}