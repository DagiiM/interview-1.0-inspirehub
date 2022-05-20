<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends User
{
    use HasFactory;

        /**
      * Ability May have Many Roles
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */

      public function darasas()
      {
        return $this->belongsToMany(Darasa::class);
      }

}
