<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reader extends Model
{
    //

    use HasFactory, Notifiable;

    protected $fillable = ['name', 'birthday', 'address', 'phone'];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
