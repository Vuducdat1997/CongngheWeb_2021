<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'parent_id',
        'slug',
        'image',
        'status',
    ];
    public function new()
    {
        return $this->hasMany(News::class);
    }
    public function parent()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }
}