<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'equipment_name',
        'equipment_quantity',
        'amount',
        'transaction_id',
        'status',
        'post_id',
        'user_id'
    ];
}
