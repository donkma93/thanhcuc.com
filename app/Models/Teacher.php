<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'bio',
        'specialization',
        'certification',
        'experience_years',
        'avatar',
        'achievements',
        'is_featured',
        'is_active',
        'sort_order',
    ];
    
    protected $casts = [
        'achievements' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
    
    /**
     * Get the achievements attribute, ensuring it's always an array
     */
    public function getAchievementsAttribute($value)
    {
        $decoded = json_decode($value, true);
        return is_array($decoded) ? $decoded : [];
    }
}
