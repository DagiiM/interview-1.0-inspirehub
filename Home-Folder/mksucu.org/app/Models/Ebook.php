<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Prunable;

class Ebook extends Model
{
    use HasFactory,SoftDeletes,Prunable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
         'subject',
         'url',
         'library_id',
     ];

     protected $dates = ['deleted_at'];

    /**
     * Get the Library that owns the ebook.
     */
    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    /**
      * Assign a new ebook to the Library
      *
      * @param mixed $library
      */

    public function assignLibrary($library)
    {
      if (is_string($library))
       {
        $library=Library::whereName($library)->firstOrFail();
      }
      $this->library()->associate($library,false);
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
