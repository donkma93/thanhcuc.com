<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;

class News extends Model
{
    use HasFactory, Translatable;
    
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
        return $this->belongsTo(User::class, 'author_id')->withDefault([
            'name' => 'Admin'
        ]);
    }

    /**
     * Get the localized title
     */
    public function getLocalizedTitleAttribute()
    {
        return $this->getLocalized('title');
    }

    /**
     * Get the localized content
     */
    public function getLocalizedContentAttribute()
    {
        return $this->getLocalized('content');
    }

    /**
     * Get the localized excerpt
     */
    public function getLocalizedExcerptAttribute()
    {
        return $this->getLocalized('excerpt');
    }
}
