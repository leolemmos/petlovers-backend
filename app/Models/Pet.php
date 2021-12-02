<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories, Model};

class Pet extends Model
{
    use Factories\HasFactory;

    protected $fillable = [
        'name',
        'photo_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
