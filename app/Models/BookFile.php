<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookFile extends Model
{
    protected $fillable = [
        'book_id',
        'filename',
        'path',
        'mime_type',
        'size',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
