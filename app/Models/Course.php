<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'category',
        'level',
        'price',
        'duration_hours',
        'target_score',
        'features',
        'image',
        'is_active',
        'sort_order',
    ];
    
    protected $casts = [
        'features' => 'array',
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];
}
