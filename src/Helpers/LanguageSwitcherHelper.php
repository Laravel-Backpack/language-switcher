<?php

namespace Backpack\LanguageSwitcher\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class LanguageSwitcherHelper
{
    /**
     * Get current locale
     */
    public function getCurrentLocale(): string
    {
        return App::getLocale();
    }

    /**
     * Get a locale name from config/backpack/crud.php
     */
    public function getLocaleName(string $locale): ?string
    {
        return config("backpack.crud.locales.$locale");
    }

    /**
     * Get a flag or the most appropriate fallback in case the flag is not present
     */
    public function getFlagOrFallback(string $locale): string
    {
        $locale = strtolower($locale);
        $parts = explode('_', str_replace('-', '_', $locale));

        $options = array_filter([
            'language-'.$locale,
            ($parts[1] ?? false) ? 'country-'.$parts[1] : null,
            $parts[0] ? 'language-'.$parts[0] : null,
            $parts[0] ? 'country-'.$parts[0] : null,
        ]);

        foreach ($options as $option) {
            if (File::exists(base_path('vendor/outhebox/blade-flags/resources/svg/'.$option.'.svg'))) {
                return $option;
            }
        }

        return $locale;
    }
}
