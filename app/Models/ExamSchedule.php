<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_type',
        'level',
        'exam_period',
        'exam_date',
        'exam_time',
        'registration_deadline',
        'fee',
        'location',
        'description',
        'status',
        'max_participants',
        'current_participants',
        'is_featured',
        'sort_order'
    ];

    protected $casts = [
        'exam_date' => 'date',
        'exam_time' => 'string',
        'registration_deadline' => 'date',
        'fee' => 'decimal:2',
        'is_featured' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('exam_date', '>=', now()->toDateString());
    }

    public function scopeByType($query, $type)
    {
        return $query->where('exam_type', $type);
    }

    public function scopeByLevel($query, $level)
    {
        return $query->where('level', $level);
    }

    // Accessors
    public function getFormattedFeeAttribute()
    {
        return number_format($this->fee, 0, ',', '.') . '₫';
    }

    public function getFormattedExamDateAttribute()
    {
        return $this->exam_date->format('d/m/Y');
    }

    public function getFormattedRegistrationDeadlineAttribute()
    {
        return $this->registration_deadline->format('d/m/Y');
    }

    public function getDayOfWeekAttribute()
    {
        $days = ['Chủ nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'];
        // Carbon dayOfWeek trả về 0-6, nhưng mảng của chúng ta cũng 0-6 nên không cần thay đổi
        return $days[$this->exam_date->dayOfWeek];
    }

    public function getTimeAttribute()
    {
        $rawValue = $this->getRawOriginal('exam_time');
        
        if (!$rawValue) return '9:00';
        
        // Nếu exam_time là string, trả về trực tiếp
        if (is_string($rawValue)) {
            return $rawValue;
        }
        
        // Nếu exam_time là Carbon instance, format nó
        if ($rawValue instanceof \Carbon\Carbon) {
            return $rawValue->format('H:i');
        }
        
        return '9:00';
    }

    public function getExamTimeAttribute()
    {
        $rawValue = $this->getRawOriginal('exam_time');
        
        if (!$rawValue) return null;
        
        // Nếu exam_time là string, trả về trực tiếp
        if (is_string($rawValue)) {
            return $rawValue;
        }
        
        // Nếu exam_time là Carbon instance, format nó
        if ($rawValue instanceof \Carbon\Carbon) {
            return $rawValue->format('H:i');
        }
        
        return null;
    }

    public function getDaysUntilExamAttribute()
    {
        return now()->diffInDays($this->exam_date, false);
    }

    // Status helpers
    public function isActive()
    {
        return $this->status === 'active';
    }

    public function isCompleted()
    {
        return $this->status === 'completed';
    }

    public function isRegistrationOpen()
    {
        // So sánh Carbon objects thay vì string
        return $this->registration_deadline->startOfDay() >= now()->startOfDay();
    }

    public function isRegistrationClosed()
    {
        // So sánh Carbon objects thay vì string
        return $this->registration_deadline->startOfDay() < now()->startOfDay();
    }

    public function isFull()
    {
        if (!$this->max_participants) return false;
        return $this->current_participants >= $this->max_participants;
    }

    public function getAvailableSlotsAttribute()
    {
        if (!$this->max_participants) return null;
        return max(0, $this->max_participants - $this->current_participants);
    }

    // Relationships
    public function registrations()
    {
        return $this->hasMany(ExamRegistration::class);
    }

    public function pendingRegistrations()
    {
        return $this->hasMany(ExamRegistration::class)->where('status', 'pending');
    }

    public function confirmedRegistrations()
    {
        return $this->hasMany(ExamRegistration::class)->where('status', 'confirmed');
    }

    public function getRegistrationCountAttribute()
    {
        return $this->registrations()->count();
    }

    public function getPendingRegistrationCountAttribute()
    {
        return $this->registrations()->where('status', 'pending')->count();
    }
}
