<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Message extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function createdAtHuman(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getCreatedAtHumanDate()
        );
    }

    protected function getCreatedAtHumanDate()
    {

        $day = match (true) {
            $this->created_at->isToday() => 'Today',
            $this->created_at->isYesterday() => 'Yesterday',
            default => $this->created_at->toDateString()
        };

        return $day . ' ' . $this->created_at->toTimeString('minute');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
