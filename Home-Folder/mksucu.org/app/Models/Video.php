<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory,SoftDeletes,Prunable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
         'subject',
         'poster',
         'url',
         'description',
         'ministry_id',
     ];

     protected $dates = ['deleted_at'];

     /**
      * Get the Ministry that owns the video.
      */
     public function ministry()
     {
         return $this->belongsTo(Ministry::class);
     }

     /**
       * Assign a new video to the Ministry
       *
       * @param mixed $ministry
       */

     public function assignMinistry($ministry)
     {
       if (is_string($ministry))
        {
         $ministry=Ministry::whereName($ministry)->firstOrFail();
       }
       $this->ministry()->associate($ministry,false);
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
