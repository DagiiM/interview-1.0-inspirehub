<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory,SoftDeletes;

    const ATTENDANCE_CLOSED = 'closed';
    const ATTENDANCE_OPEN = 'open';

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

    protected $dates = ['deleted_at'];

    protected $guarded=[];

    /**
    * The users that belong to the Attendance.
    *
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    */
    public function users()
    {
        return $this->belongsToMany(User::class);//->withTimestamps();
    }

              /**
       * Assign a new Darasa to the Student
       *
       * @param mixed $user
       */

     public function assignUser($user)
     {
       if (is_string($user))
        {
         $user=User::whereName($user)->firstOrFail();
       }
       $this->users()->sync($user,false);
     }
}
