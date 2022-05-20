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

           /**
       * Assign a new Darasa to the Student
       *
       * @param mixed $role
       */

     public function assignDarasa($darasa)
     {
       if (is_string($darasa))
        {
         $role=Darasa::whereName($darasa)->firstOrFail();
       }
       $this->darasas()->sync($darasa,false);
     }

}
