<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Borrow extends Model
{
    //
    use HasFactory, Notifiable;

    protected $fillable = ['reader_id', 'book_id', 'borrow_date', 'return_date', 'status'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }
}
