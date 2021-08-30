<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable = [
        'type',
        'name',
        'menu_url',
        'menu_order',
        'page_id',
        'parent_id',
    ];

    public function menuchildrent()
    {
        return $this->hasMany(Menus::class, 'parent_id');
    }
}