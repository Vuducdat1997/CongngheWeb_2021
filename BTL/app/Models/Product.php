<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'banner',
        'logo',
        'title',
        'describe',
        'content',
        'capacity',
        'plastic_box',
        'concentration',
        'image',
        'status',
    ];
}