<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Prunable;

class Ability extends Model
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
         'priority',
     ];

     protected $dates = ['deleted_at'];

    protected $guarded=[];

    /**
      * Ability May have Many Roles
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */

      public function roles()
      {
        return $this->belongsToMany(Role::class);
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
