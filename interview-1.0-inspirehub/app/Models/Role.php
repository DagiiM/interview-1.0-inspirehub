<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Prunable;

class Role extends Model
{
    use HasFactory,SoftDeletes,Prunable;

    /**
      * The attributes that aren't mass assignable
      * @var array
      */

      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
       protected $fillable = [
           'name',
           'description',
       ];

       protected $dates = ['deleted_at'];

      protected $guarded=[];

      /**
        * A Role May have Many Users
        *
        * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
        */

        public function users()
        {
          return $this->belongsToMany(User::class)->using(RoleUser::class);
        }


      /**
      * A role may have many abilities
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */

      public function abilities()
      {
        return $this->belongsToMany(Ability::class)->withTimestamps();
      }

      public function allowTo($ability)
      {
        if (is_string($ability))
         {
          $ability=Ability::whereName($ability)->firstOrFail();
        }
        $this->abilities()->sync($ability,false);
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
