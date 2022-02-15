<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compliment extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'sender_user_id',
        'receiver_user_id'
    ];

    function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
