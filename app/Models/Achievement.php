<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'student_name',
        'class_name',
        'avatar',
        'category',
        'score',
        'achievement_title',
        'description',
        'certificate',
        'university',
        'achievement_date',
        'rank',
        'is_featured',
        'is_active',
        'sort_order',
    ];
    
    protected $casts = [
        'achievement_date' => 'date',
        'score' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
    
    // Scope for different categories
    public function scopeMonthly($query)
    {
        return $query->where('category', 'monthly');
    }
    
    public function scopeExam($query)
    {
        return $query->where('category', 'exam');
    }
    
    public function scopeScholarship($query)
    {
        return $query->where('category', 'scholarship');
    }
    
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
    
    // Get category display name
    public function getCategoryDisplayAttribute()
    {
        $categories = [
            'monthly' => 'Thành tích tháng',
            'exam' => 'Thành tích thi cử',
            'scholarship' => 'Du học thành công'
        ];
        
        return $categories[$this->category] ?? $this->category;
    }
    
    // Get rank display
    public function getRankDisplayAttribute()
    {
        $ranks = [
            1 => 'Hạng nhất',
            2 => 'Hạng nhì', 
            3 => 'Hạng ba'
        ];
        
        return $ranks[$this->rank] ?? "Hạng {$this->rank}";
    }
}
