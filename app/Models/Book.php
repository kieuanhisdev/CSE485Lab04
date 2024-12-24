<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'author', 'category', 'year', 'quantity'];
    //

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
