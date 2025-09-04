<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    /**
     * Switch application language
     *
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchLanguage($locale)
    {
        // Validate locale
        $availableLocales = ['vi', 'en', 'de'];
        
        if (!in_array($locale, $availableLocales)) {
            abort(400, 'Invalid language');
        }
        
        // Set locale in session
        Session::put('locale', $locale);
        
        // Set locale in application
        App::setLocale($locale);
        
        // Redirect back to previous page or home
        return Redirect::back()->with('success', 'Language changed successfully');
    }
    
    /**
     * Get current locale
     *
     * @return string
     */
    public function getCurrentLocale()
    {
        return App::getLocale();
    }
    
    /**
     * Get available locales
     *
     * @return array
     */
    public function getAvailableLocales()
    {
        return [
            'vi' => [
                'name' => 'Tiếng Việt',
                'native' => 'Tiếng Việt',
                'flag' => '🇻🇳'
            ],
            'en' => [
                'name' => 'English',
                'native' => 'English',
                'flag' => '🇺🇸'
            ],
            'de' => [
                'name' => 'Deutsch',
                'native' => 'Deutsch',
                'flag' => '🇩🇪'
            ]
        ];
    }
}
