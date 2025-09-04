<?php

namespace App\Traits;

use App\Models\Translation;

trait Translatable
{
    /**
     * Get the translations for this model.
     */
    public function translations()
    {
        return $this->morphMany(Translation::class, 'translatable');
    }

    /**
     * Get a translated field value
     */
    public function getTranslated($field, $locale = null)
    {
        if (!$locale) {
            $locale = app()->getLocale();
        }

        // First try to get from translations table
        $translation = Translation::getValue(
            get_class($this),
            $this->id,
            $field,
            $locale
        );

        if ($translation) {
            return $translation;
        }

        // Fallback to original field value
        return $this->getAttribute($field);
    }

    /**
     * Set a translated field value
     */
    public function setTranslated($field, $value, $locale)
    {
        return Translation::setValue(
            get_class($this),
            $this->id,
            $field,
            $value,
            $locale
        );
    }

    /**
     * Get all translations for a specific field
     */
    public function getFieldTranslations($field)
    {
        return $this->translations()
            ->where('field', $field)
            ->get()
            ->pluck('value', 'locale');
    }

    /**
     * Check if a field has translation for a specific locale
     */
    public function hasTranslation($field, $locale)
    {
        return $this->translations()
            ->where('field', $field)
            ->where('locale', $locale)
            ->exists();
    }

    /**
     * Get the current locale value or fallback to default
     */
    public function getLocalized($field, $fallbackLocale = 'vi')
    {
        $currentLocale = app()->getLocale();
        
        // Try current locale first
        $value = $this->getTranslated($field, $currentLocale);
        if ($value) {
            return $value;
        }

        // Try fallback locale
        if ($currentLocale !== $fallbackLocale) {
            $value = $this->getTranslated($field, $fallbackLocale);
            if ($value) {
                return $value;
            }
        }

        // Return original field value
        return $this->getAttribute($field);
    }

    /**
     * Scope to filter by current locale
     */
    public function scopeLocalized($query, $locale = null)
    {
        if (!$locale) {
            $locale = app()->getLocale();
        }

        return $query->whereHas('translations', function ($q) use ($locale) {
            $q->where('locale', $locale);
        });
    }
}
