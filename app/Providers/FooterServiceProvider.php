<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use App\Models\Course;

class FooterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share footer data with all non-admin views
        View::composer('*', function ($view) {
            // Only load footer data for non-admin views
            if (!request()->is('admin*')) {
                $view->with([
                    'footerSettings' => $this->getFooterSettings(),
                    'footerCourses' => $this->getFooterCourses(),
                    'footerBranches' => $this->getFooterBranches(),
                ]);
            }
        });
    }

    /**
     * Get footer settings
     */
    private function getFooterSettings()
    {
        return cache()->remember('footer_settings', 3600, function () {
            return Setting::whereIn('group', ['company', 'social'])
                ->pluck('value', 'key')
                ->toArray();
        });
    }

    /**
     * Get footer courses
     */
    private function getFooterCourses()
    {
        return cache()->remember('footer_courses', 3600, function () {
            return \App\Models\Course::where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->limit(6)
                ->select('id', 'name', 'slug')
                ->get();
        });
    }

    /**
     * Get footer branches
     */
    private function getFooterBranches()
    {
        return cache()->remember('footer_branches', 3600, function () {
            return Setting::where('group', 'branches')
                ->ordered()
                ->get()
                ->map(function ($branch) {
                    return [
                        'label' => $branch->label,
                        'data' => json_decode($branch->value, true)
                    ];
                });
        });
    }
}
