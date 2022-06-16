<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Prunable;

class Chat extends Model
{
    use HasFactory,SoftDeletes,Prunable;

    const AVAILABLE_CHAT = 'available';
    const UNAVAILABLE_CHAT = 'unavailable';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
         'sender_id',
         'ministry_id',
         'message',
         'attachment',
         'status',
         'Expiration_date',
     ];

     protected $dates = ['deleted_at'];

     public function isAvailable()
     {
         return $this->status == Chat::AVAILABLE_CHAT;
     }
     /**
     * Get the Sender that owns the chat.
     */
    public function sender()
    {
        return $this->belongsTo(Sender::class);
    }

    /**
     * Get the User that owns the chat.
     */
    public function ministry()
    {
        return $this->belongsTo(Ministry::class);
    }

    /**
     * Get the prunable model query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function prunable()
    {
        return static::where('created_at', '<=', now()->addDays(7));
    }
}
