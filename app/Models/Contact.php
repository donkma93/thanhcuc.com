<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'program',
        'message',
        'status',
        'admin_notes',
        'contacted_at',
    ];

    protected $casts = [
        'contacted_at' => 'datetime',
    ];

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeContacted($query)
    {
        return $query->where('status', 'contacted');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'new' => '<span class="badge bg-primary">Mới</span>',
            'contacted' => '<span class="badge bg-warning">Đã liên hệ</span>',
            'completed' => '<span class="badge bg-success">Hoàn thành</span>',
        ];

        return $badges[$this->status] ?? '<span class="badge bg-secondary">Không xác định</span>';
    }

    public function markAsContacted()
    {
        $this->update([
            'status' => 'contacted',
            'contacted_at' => now(),
        ]);
    }

    public function markAsCompleted()
    {
        $this->update(['status' => 'completed']);
    }
}
