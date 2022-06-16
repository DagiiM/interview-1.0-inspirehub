<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Prunable;

class Library extends Model
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
     ];

     protected $dates = ['deleted_at'];

    /**
     * Get the ebooks for the library.
     */
    public function ebooks()
    {
        return $this->hasMany(Ebook::class);
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
