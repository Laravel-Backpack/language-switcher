<?php

namespace Backpack\LanguageSwitcher\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use WhiteCube\Lingua\Service as Lingua;

class LanguageSwitcherHelper
{
    /**
     * Get current locale
     */
    public function getCurrentLocale(): string
    {
        return strtolower(App::getLocale());
    }

    /**
     * Get native language name
     */
    public function getLocaleNativeName(?string $locale = null): string
    {
        $locale ??= $this->getCurrentLocale();
        $locale = str_replace('-', '_', strtolower($locale));
        $suffix = str_contains($locale, '_') ? ' ('.strtoupper(Str::after($locale, '_')).')' : '';

        return ucwords(Lingua::createFromPHP($locale)->toNative()).$suffix;
    }

    /**
     * Get most appropriate fallback in case the flag is not present
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
