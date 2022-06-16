<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sender extends User
{
    use HasFactory;

    /**
     * Get the chats for the sender.
     */
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }


}
