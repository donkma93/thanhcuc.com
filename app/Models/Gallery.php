<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'type',
        'sort_order',
        'is_active',
        'level',
        'students'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeClassroom($query)
    {
        return $query->where('type', 'classroom');
    }

    public function scopeFacility($query)
    {
        return $query->where('type', 'facility');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at');
    }

    // Accessors
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }

    public function getTypeDisplayAttribute()
    {
        return $this->type === 'classroom' ? 'Lớp học' : 'Cơ sở vật chất';
    }

    public function getStatusDisplayAttribute()
    {
        return $this->is_active ? 'Hoạt động' : 'Tạm dừng';
    }
}
