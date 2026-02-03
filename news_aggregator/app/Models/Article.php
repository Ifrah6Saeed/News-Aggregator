<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'category_id'
    ];

    // Article belongs to category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Article can be favorited by many users
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
