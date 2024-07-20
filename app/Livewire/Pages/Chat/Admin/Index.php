<?php

namespace App\Livewire\Pages\Chat\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.chat.admin.index');
    }
}