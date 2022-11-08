<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'name',
        'author',
        'description',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
