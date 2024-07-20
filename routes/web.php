<?php

use App\Livewire\Pages\Home;
use App\Events\MessageCreated;
use App\Livewire\Pages\Chat\Room;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Chat\Admin\Index;
use App\Http\Controllers\ProfileController;
use App\Livewire\Pages\Chat\Admin\Room as AdminRoom;
use App\Models\Message;
use App\Models\Room as ModelsRoom;

Route::get('/', Home::class)->name('home');
Route::get('/room/{room}', Room::class)->name('room');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {
        Route::get('/chats', Index::class)->name('chats');
        Route::get('/chat/{room}', AdminRoom::class)->name('chat.room');
    });
});

require __DIR__ . '/auth.php';
