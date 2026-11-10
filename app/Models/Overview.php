<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'paragraph_1',
        'paragraph_2',
        'video_url',
        'video_title',
        'image_path',
        'image_title',
        'button_1_text',
        'button_1_url',
        'button_2_text',
        'button_2_url',
        'button_3_text',
        'button_3_url',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getVideoEmbedUrlAttribute()
    {
        if (!$this->video_url) {
            return null;
        }

        // Convert YouTube URL to embed URL
        $videoId = null;
        if (preg_match('/youtube\.com\/watch\?v=([^&]+)/', $this->video_url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/youtu\.be\/([^?]+)/', $this->video_url, $matches)) {
            $videoId = $matches[1];
        }

        return $videoId ? "https://www.youtube.com/embed/{$videoId}?start=58&feature=oembed" : null;
    }

    public function getImageUrlAttribute()
    {
        $path = $this->image_path ?: 'images/about/team-photo.jpg';

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        if (file_exists(public_path($path))) {
            return asset($path);
        }

        if (file_exists(public_path('storage/' . $path))) {
            return asset('storage/' . $path);
        }

        return asset('images/about/team-photo.jpg');
    }
}
