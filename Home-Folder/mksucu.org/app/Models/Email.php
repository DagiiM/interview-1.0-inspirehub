<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Prunable;

class Email extends Model
{
    use HasFactory,SoftDeletes,Prunable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
              'sender_email',
              'receiver_email',
              'subject',
              'message',
              'url',
              'Expiration_date',
            ];

    protected $dates = ['deleted_at'];

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
