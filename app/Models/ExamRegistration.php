<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExamRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_schedule_id',
        'full_name',
        'phone',
        'email',
        'birth_date',
        'id_card',
        'address',
        'notes',
        'status',
        'admin_notes',
        'confirmed_at',
        'confirmed_by'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'confirmed_at' => 'datetime',
    ];

    // Relationships
    public function examSchedule(): BelongsTo
    {
        return $this->belongsTo(ExamSchedule::class);
    }

    public function confirmedBy(): BelongsTo
    {
        return $this->belongsTo(AdminUser::class, 'confirmed_by');
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeByExamSchedule($query, $examScheduleId)
    {
        return $query->where('exam_schedule_id', $examScheduleId);
    }

    // Accessors
    public function getStatusTextAttribute()
    {
        $statuses = [
            'pending' => 'Chờ xác nhận',
            'confirmed' => 'Đã xác nhận',
            'cancelled' => 'Đã hủy',
            'completed' => 'Đã hoàn thành'
        ];

        return $statuses[$this->status] ?? 'Không xác định';
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => 'bg-warning',
            'confirmed' => 'bg-success',
            'cancelled' => 'bg-danger',
            'completed' => 'bg-info'
        ];

        return $badges[$this->status] ?? 'bg-secondary';
    }

    public function getFormattedBirthDateAttribute()
    {
        return $this->birth_date ? $this->birth_date->format('d/m/Y') : '-';
    }

    public function getFormattedConfirmedAtAttribute()
    {
        return $this->confirmed_at ? $this->confirmed_at->format('d/m/Y H:i') : '-';
    }

    public function getAgeAttribute()
    {
        if (!$this->birth_date) return null;
        return $this->birth_date->age;
    }

    // Helper methods
    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isConfirmed()
    {
        return $this->status === 'confirmed';
    }

    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }

    public function isCompleted()
    {
        return $this->status === 'completed';
    }

    public function canBeConfirmed()
    {
        return $this->status === 'pending';
    }

    public function canBeCancelled()
    {
        return in_array($this->status, ['pending', 'confirmed']);
    }

    public function canBeCompleted()
    {
        return $this->status === 'confirmed';
    }
}
