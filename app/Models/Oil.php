<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oil extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'work_location',
        'amount',
        'location',
        'created_at',
        'completed'
    ];

    public $timestamps = false;
}
