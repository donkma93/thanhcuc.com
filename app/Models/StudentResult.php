<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'image_path',
        'student_name',
        'certificate_type',
        'level',
        'score',
        'sort_order',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    // Scopes
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
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeScores($query)
    {
        return $query->where('type', 'score');
    }

    public function scopeFeedbacks($query)
    {
        return $query->where('type', 'feedback');
    }

    // Accessors
    public function getImageUrlAttribute()
    {
        if (str_starts_with($this->image_path, 'http')) {
            return $this->image_path;
        }
        return asset('storage/' . $this->image_path);
    }

    public function getTypeLabelAttribute()
    {
        return $this->type === 'score' ? 'Bảng Điểm' : 'Phản Hồi';
    }

    public function getTypeColorAttribute()
    {
        return $this->type === 'score' ? 'success' : 'info';
    }

    // Relationships (nếu cần)
    // public function student()
    // {
    //     return $this->belongsTo(Student::class);
    // }
}
