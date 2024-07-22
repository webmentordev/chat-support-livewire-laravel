<?php

namespace App\Livewire\Pages\Chat\Admin;

use App\Models\Room;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use Illuminate\Support\Collection;

class Index extends Component
{

    public Collection $rooms;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.chat.admin.index');
    }

    public function mount()
    {
        $this->fill([
            'rooms' => Room::latest()
                ->take(100)
                ->get()
        ]);
    }

    #[On("room.created")]
    public function prependRooms($id)
    {
        $this->rooms->prepend(Room::find($id));
    }

    #[On('echo-channel:room.created,RoomCreated')]
    public function prependMessageBroadcast(array $payload)
    {
        $this->prependRooms($payload['id']);
    }
}
