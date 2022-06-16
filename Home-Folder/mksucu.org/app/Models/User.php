<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Prunable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes,Prunable;

    const VERIFIED_USER='1';
    const UNVERIFIED_USER='0';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
         'firstname',
         'lastname',
         'email',
         'mobile',
         'reg_number',
         'bio',
         'address',
         'city',
         'picture',
         'country',
         'gender',
         'cover_image',
         'postal_code',
         'password',
         'verified',
         'verification_token',
     ];

     protected $dates = ['deleted_at'];

     protected $table='users';

     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
         'password',
         'remember_token',
         'verification_token',
     ];

     /**
      * The attributes that should be cast to native types.
      *
      * @var array
      */
     protected $casts = [
         'email_verified_at' => 'datetime',
     ];

   public function setFirstnameAttribute($firstname)
   {
     $this->attributes['firstname']=strtolower($firstname);
   }

   public function getFirstnameAttribute($firstname)
   {
     return ucwords($firstname);
   }

   public function setLastameAttribute($lastname)
   {
     $this->attributes['lastname']=strtolower($lastname);
   }

   public function getLastnameAttribute($lastname)
   {
     return ucwords($lastname);
   }

   public function setEmailAttribute($email)
   {
     $this->attributes['email']=strtolower($email);
   }

   public static function generateVerificationCode()
   {
      return Str::random(40);
   }

   /**
     * A user May have Many Roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

     public function roles()
     {
       return $this->belongsToMany(Role::class)->withTimestamps();
     }

     /**
       * Assign a new role to the user
       *
       * @param mixed $role
       */

     public function assignRole($role)
     {
       if (is_string($role))
        {
         $role=Role::whereName($role)->firstOrFail();
       }
       $this->roles()->sync($role,false);
     }

     /**
       * Fetch The Users Abilities
       *
       * @return array
       */

       public function abilities()
       {
         return $this->roles->map->abilities->flatten()->pluck('name')->values()->unique();
       }

       /**
        * Get the notifications for the User.
        */
       public function notifications()
       {
           return $this->hasMany(Notification::class)->withTimestamps();
       }

       /**
       * A User may have many ministries
       *
       * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
       */

       public function ministries()
       {
         return $this->belongsToMany(Ministry::class)->withTimestamps();
       }

       /**
         * Assign a new ministry to the user
         *
         * @param mixed $ministry
         */

       public function assignMinistry($ministry)
       {
         if (is_string($ministry))
          {
           $ministry=Ministry::whereName($ministry)->firstOrFail();
         }
         $this->ministries()->sync($ministry,false);
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
