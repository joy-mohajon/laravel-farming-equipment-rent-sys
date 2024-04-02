<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'amount',
        'transaction_id',
        'status',
        'post_id',
        'user_id'
    ];


    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'id');
    }
}
