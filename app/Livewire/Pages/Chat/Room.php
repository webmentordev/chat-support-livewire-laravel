<?php

namespace App\Livewire\Pages\Chat;

use App\Models\Message;
use Livewire\Component;
use App\Events\TestEvent;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use App\Events\MessageCreated;
use App\Models\Room as RoomModel;
use App\Models\User;
use Illuminate\Support\Collection;

class Room extends Component
{
    #[Rule('required')]
    public string $message = '';
    public $online = false;
    public $count = 0;
    public Collection $user;

    public RoomModel $room;

    public function mount()
    {
        if (!$this->room->is_active) {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.pages.chat.room');
    }

    public function sendMessage()
    {
        $this->validate();
        $message = Message::create([
            'message' => $this->message,
            'room_id' => $this->room->id,
            'user_id' => auth()->check() ? 1 : 0
        ]);
        broadcast(new MessageCreated($this->room, $message))->toOthers();
        $this->reset(['message']);
        $this->dispatch('message.sent', $message->id);
    }
}
