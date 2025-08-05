<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
        'sort_order',
    ];

    public function scopeByGroup($query, $group)
    {
        return $query->where('group', $group);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public static function get($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    public static function set($key, $value)
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    public function getFormattedValueAttribute()
    {
        switch ($this->type) {
            case 'boolean':
                return $this->value ? 'Có' : 'Không';
            case 'json':
                return json_decode($this->value, true);
            case 'image':
                return $this->value ? asset('storage/' . $this->value) : null;
            default:
                return $this->value;
        }
    }
}
