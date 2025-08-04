<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'slug',
        'description',
        'requirements',
        'benefits',
        'salary_range',
        'location',
        'employment_type',
        'department',
        'application_deadline',
        'is_active',
        'is_featured',
    ];
    
    protected $casts = [
        'application_deadline' => 'date',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];
}
