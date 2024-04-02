<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'rent',
        'quantity',
        'imageUrl',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function buyInfos(): HasMany
    {
        return $this->hasMany(Buy::class, 'post_id');
    }

    public function rentInfos(): HasMany
    {
        return $this->hasMany(Rent::class, 'post_id');
    }
}
