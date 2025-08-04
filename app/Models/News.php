<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'category',
        'is_published',
        'is_featured',
        'published_at',
        'author_id',
    ];
    
    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];
    
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
