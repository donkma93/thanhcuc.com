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
}
