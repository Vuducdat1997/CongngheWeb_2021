<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photogroups extends Model
{
    use HasFactory;
    protected $table = 'photogroups';
    protected $fillable = [
        'name',
        'content',
    ];
}