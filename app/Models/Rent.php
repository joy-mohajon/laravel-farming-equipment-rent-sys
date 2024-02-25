<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'transaction_id',
        'status',
        'post_id',
        'user_id'
    ];
}
