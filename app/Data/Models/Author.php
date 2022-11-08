<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'book_id',
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
