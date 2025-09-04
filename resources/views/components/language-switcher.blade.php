<div class="language-switcher dropdown">
    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-globe me-2"></i>
        @switch(app()->getLocale())
            @case('vi')
                🇻🇳 {{ __('general.vietnamese') }}
                @break
            @case('en')
                🇺🇸 {{ __('general.english') }}
                @break
            @case('de')
                🇩🇪 {{ __('general.german') }}
                @break
            @default
                🇻🇳 {{ __('general.vietnamese') }}
        @endswitch
    </button>
    
    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
        <li>
            <a class="dropdown-item" href="{{ route('language.switch', 'vi') }}">
                🇻🇳 {{ __('general.vietnamese') }}
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('language.switch', 'en') }}">
                🇺🇸 {{ __('general.english') }}
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('language.switch', 'de') }}">
                🇩🇪 {{ __('general.german') }}
            </a>
        </li>
    </ul>
</div>

<style>
.language-switcher .dropdown-toggle {
    border-radius: 25px;
    padding: 8px 16px;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.language-switcher .dropdown-toggle:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.language-switcher .dropdown-menu {
    border: none;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    padding: 8px 0;
    min-width: 180px;
}

.language-switcher .dropdown-item {
    padding: 10px 20px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    border-radius: 8px;
    margin: 2px 8px;
}

.language-switcher .dropdown-item:hover {
    background-color: rgba(1, 88, 98, 0.1);
    color: var(--primary-color);
    transform: translateX(5px);
}

.language-switcher .dropdown-item:active {
    background-color: rgba(1, 88, 98, 0.2);
}
</style>
