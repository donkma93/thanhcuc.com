<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'image_path',
        'duration',
        'salary_range',
        'opportunity_level',
        'requirements',
        'benefits',
        'icon',
        'color',
        'sort_order',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'requirements' => 'array',
        'benefits' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }

    public function getIconHtmlAttribute()
    {
        return $this->icon ? '<i class="' . $this->icon . '" style="color: ' . $this->color . '"></i>' : '';
    }

    public function getOpportunityBadgeAttribute()
    {
        $colors = [
            'Cao' => 'success',
            'Rất cao' => 'primary',
            'Trung bình' => 'warning',
            'Thấp' => 'secondary',
        ];
        
        $color = $colors[$this->opportunity_level] ?? 'secondary';
        return '<span class="badge bg-' . $color . '">' . $this->opportunity_level . '</span>';
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value ?: \Str::slug($this->name);
    }
}
