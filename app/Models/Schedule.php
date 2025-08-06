<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'level',
        'description',
        'start_date',
        'end_date',
        'schedule_days',
        'start_time',
        'end_time',
        'duration_months',
        'max_students',
        'current_students',
        'price',
        'original_price',
        'discount_percentage',
        'teacher_name',
        'teacher_title',
        'teacher_avatar',
        'course_type',
        'status',
        'is_featured',
        'is_popular',
        'registration_deadline',
        'location',
        'requirements',
        'benefits',
        'curriculum',
        'certificate',
        'meta_title',
        'meta_description',
        'slug',
        'sort_order'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'registration_deadline' => 'date',
        'schedule_days' => 'array',
        'requirements' => 'array',
        'benefits' => 'array',
        'curriculum' => 'array',
        'is_featured' => 'boolean',
        'is_popular' => 'boolean',
        'price' => 'decimal:0',
        'original_price' => 'decimal:0',
        'discount_percentage' => 'integer',
        'current_students' => 'integer',
        'max_students' => 'integer',
        'duration_months' => 'integer',
        'sort_order' => 'integer'
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'registration_deadline',
        'deleted_at'
    ];

    // Constants for course levels
    const LEVELS = [
        'a1-a2' => 'Cơ Bản A1-A2',
        'b1-b2' => 'Trung Cấp B1-B2',
        'c1-c2' => 'Nâng Cao C1-C2',
        'business' => 'Tiếng Đức Thương Mại',
        'exam' => 'Luyện Thi Chứng Chỉ',
        'online' => 'Học Online'
    ];

    // Constants for course types
    const TYPES = [
        'regular' => 'Khóa Học Thường',
        'intensive' => 'Khóa Học Chuyên Sâu',
        'weekend' => 'Khóa Học Cuối Tuần',
        'private' => 'Khóa Học Riêng',
        'group' => 'Khóa Học Nhóm'
    ];

    // Constants for status
    const STATUSES = [
        'draft' => 'Bản Nháp',
        'published' => 'Đã Xuất Bản',
        'full' => 'Đã Đầy',
        'cancelled' => 'Đã Hủy',
        'completed' => 'Đã Hoàn Thành'
    ];

    // Constants for schedule days
    const DAYS = [
        'monday' => 'Thứ 2',
        'tuesday' => 'Thứ 3',
        'wednesday' => 'Thứ 4',
        'thursday' => 'Thứ 5',
        'friday' => 'Thứ 6',
        'saturday' => 'Thứ 7',
        'sunday' => 'Chủ Nhật'
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($schedule) {
            if (empty($schedule->slug)) {
                $schedule->slug = \Str::slug($schedule->title);
            }
        });

        static::updating(function ($schedule) {
            if ($schedule->isDirty('title') && empty($schedule->slug)) {
                $schedule->slug = \Str::slug($schedule->title);
            }
        });
    }

    /**
     * Scope for published schedules
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope for featured schedules
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for popular schedules
     */
    public function scopePopular($query)
    {
        return $query->where('is_popular', true);
    }

    /**
     * Scope for available schedules (not full)
     */
    public function scopeAvailable($query)
    {
        return $query->whereRaw('current_students < max_students')
                    ->where('status', 'published');
    }

    /**
     * Get available spots
     */
    public function getAvailableSpotsAttribute()
    {
        return $this->max_students - $this->current_students;
    }

    /**
     * Get availability percentage
     */
    public function getAvailabilityPercentageAttribute()
    {
        if ($this->max_students == 0) return 0;
        return round(($this->current_students / $this->max_students) * 100);
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0, ',', '.') . '₫';
    }

    /**
     * Get formatted original price
     */
    public function getFormattedOriginalPriceAttribute()
    {
        return number_format($this->original_price, 0, ',', '.') . '₫';
    }

    /**
     * Get level name
     */
    public function getLevelNameAttribute()
    {
        return self::LEVELS[$this->level] ?? $this->level;
    }

    /**
     * Get type name
     */
    public function getTypeNameAttribute()
    {
        return self::TYPES[$this->course_type] ?? $this->course_type;
    }

    /**
     * Get status name
     */
    public function getStatusNameAttribute()
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }

    /**
     * Get formatted schedule days
     */
    public function getFormattedScheduleDaysAttribute()
    {
        if (!$this->schedule_days) return '';
        
        $days = [];
        foreach ($this->schedule_days as $day) {
            $days[] = self::DAYS[$day] ?? $day;
        }
        
        return implode(', ', $days);
    }

    /**
     * Check if registration is still open
     */
    public function getIsRegistrationOpenAttribute()
    {
        if (!$this->registration_deadline) return true;
        return now()->lte($this->registration_deadline);
    }

    /**
     * Check if course is starting soon
     */
    public function getIsStartingSoonAttribute()
    {
        return $this->start_date && $this->start_date->diffInDays(now()) <= 7;
    }

    /**
     * Get badge class based on availability
     */
    public function getBadgeClassAttribute()
    {
        $percentage = $this->availability_percentage;
        
        if ($percentage >= 90) return 'bg-danger';
        if ($percentage >= 70) return 'bg-warning';
        return 'bg-success';
    }

    /**
     * Get badge text based on availability
     */
    public function getBadgeTextAttribute()
    {
        $spots = $this->available_spots;
        
        if ($spots <= 0) return 'Đã đầy';
        if ($spots <= 2) return 'Sắp hết chỗ';
        return "Còn {$spots} chỗ";
    }
}