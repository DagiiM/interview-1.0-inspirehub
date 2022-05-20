<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Darasa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];


      /**
      * A Darasa has have many students
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */

      public function students()
      {
        return $this->belongsToMany(Student::class)->withTimestamps();
      }
}
