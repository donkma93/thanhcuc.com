<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Translation extends Model
{
    protected $fillable = [
        'locale',
        'translatable_type',
        'translatable_id',
        'field',
        'value'
    ];

    /**
     * Get the parent translatable model.
     */
    public function translatable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Scope a query to only include translations for a specific locale.
     */
    public function scopeForLocale($query, $locale)
    {
        return $query->where('locale', $locale);
    }

    /**
     * Scope a query to only include translations for a specific field.
     */
    public function scopeForField($query, $field)
    {
        return $query->where('field', $field);
    }

    /**
     * Get translation value for a specific locale and field
     */
    public static function getValue($translatableType, $translatableId, $field, $locale = null)
    {
        if (!$locale) {
            $locale = app()->getLocale();
        }

        $translation = static::where([
            'translatable_type' => $translatableType,
            'translatable_id' => $translatableId,
            'field' => $field,
            'locale' => $locale
        ])->first();

        return $translation ? $translation->value : null;
    }

    /**
     * Set translation value for a specific locale and field
     */
    public static function setValue($translatableType, $translatableId, $field, $value, $locale)
    {
        return static::updateOrCreate(
            [
                'translatable_type' => $translatableType,
                'translatable_id' => $translatableId,
                'field' => $field,
                'locale' => $locale
            ],
            ['value' => $value]
        );
    }
}
