<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = [ 
        'categories_id',
        'user_id',
        'title',
        'desc',
        'details',
        'slug',
        'image',
        'status',
        'featured',
        'view_count',
    ];
    public function categories()
    {
        return $this->belongsTo(categories::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}