<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'description', 'price', 'stock', 'image', 'category'
    ];

    protected $keyType = 'string';
    public $incrementing = false;
}

