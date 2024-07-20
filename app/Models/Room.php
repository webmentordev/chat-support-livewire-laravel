<?php

namespace App\Models;

use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];


    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
