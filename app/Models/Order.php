<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'work_location',
        'amount',
        'period',
        'created_at',
        'completed'
    ];

    public $timestamps = false;
}
