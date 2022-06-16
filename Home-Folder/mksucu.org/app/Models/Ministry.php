<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Prunable;

class Ministry extends Model
{
    use HasFactory,SoftDeletes,Prunable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
         'name',
         'description',
         'image',
     ];

     protected $dates = ['deleted_at'];

    /**
      * Ministry May have Many users
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */

      public function users()
      {
        return $this->belongsToMany(User::class);
      }

      /**
       * Get the notifications for the Ministry.
       */
      public function notifications()
      {
          return $this->hasMany(Notification::class);
      }

      /**
       * Get the chats for the ministry.
       */
      public function chats()
      {
          return $this->hasMany(Chat::class);
      }

      /**
       * Get the videos for the Ministry.
       */
      public function videos()
      {
          return $this->hasMany(Video::class);
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
