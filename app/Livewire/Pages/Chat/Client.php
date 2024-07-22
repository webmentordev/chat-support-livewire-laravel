<?php

namespace App\Livewire\Pages\Chat;

use App\Events\RoomCreated;
use App\Models\Message;
use App\Models\Room;
use Livewire\Component;

class Client extends Component
{
    public $email, $name, $subject, $message;

    public function render()
    {
        return view('livewire.pages.chat.client');
    }

    public function createChatRoom()
    {
        $this->validate([
            'name' => 'required|max:255',
            'subject' => 'required|max:255',
            'email' => 'required|max:255|email',
            'message' => 'required'
        ]);
        $room = Room::create([
            'name' => $this->name,
            'subject' => $this->subject,
            'email' => $this->email,
        ]);
        Message::create([
            'message' => $this->message,
            'user_id' => 0,
            'room_id' => $room->id
        ]);
        $this->dispatch('room.created', $room->id);
        broadcast(new RoomCreated($room))->toOthers();
        return $this->redirect('/room/' . $room->id);
    }
}
