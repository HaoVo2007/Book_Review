<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author',
        'image',
    ];

    public function reviews() 
    {
        return $this->hasMany(Review::class);
    }

    protected static function booted()
    {
        static::created(function (Book $book) { 
            cache()->forget('book:' . $book->id);
        });

        static::updated(function (Book $book) {
            cache()->forget('book:' . $book->id);
        });

        static::deleted(function (Book $book) {
            cache()->forget('book:' . $book->id);
        });
    }

}
