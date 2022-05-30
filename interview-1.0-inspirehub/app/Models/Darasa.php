<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Darasa extends Model
{
    use HasFactory;

    const DARASA_OPEN = '1';
    const DARASA_CLOSED = '0';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'status',
    ];


      /**
      * A Darasa has have many attendances
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */

      public function attendances()
      {
        return $this->belongsToMany(Attendance::class)->withTimestamps();
      }


      /**
       * Assign a new Attendance to the Darasa
       *
       * @param mixed $attendance
       */

     public function assignAttendance($attendance)
     {
       if (is_string($attendance))
        {
         $attendance=Attendance::whereName($attendance)->firstOrFail();
       }
       $this->attendances()->sync($attendance,false);
     }

            /**
      * A Darasa has have many students
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */

      public function users()
      {
        return $this->belongsToMany(User::class)->withTimestamps();
      }
}
