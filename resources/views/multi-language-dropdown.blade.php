@inject('helper', 'Backpack\MultiLanguage\Helpers\MultiLanguageHelper')

<li class="nav-item me-2 dropdown">
    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
        @if($flags ?? true)
        <span class="nav-link-icon" style="width: fit-content">
            <x-dynamic-component component="flag-{{ $helper->getFlagOrFallback($helper->getCurrentLocale()) }}" />
        </span>
        @endif
        @if($main_label ?? false || (($flags ?? true) === false && !isset($main_label)))
        <span class="nav-link-title">
            {{ $helper->getLocaleNativeName() }}
        </span>
        @endif
    </a>
    <ul class="dropdown-menu">
        @foreach(config('backpack.multi-language.locales', []) as $locale)
        <li>
            <a class="dropdown-item {{ $locale === $helper->getCurrentLocale() ? 'active disabled' : '' }}" href="{{ route('multi-language.locale', $locale) }}">
                @if($flags ?? true)
                <span class="nav-link-icon" style="width: fit-content">
                    <x-dynamic-component component="flag-{{ $helper->getFlagOrFallback($locale) }}" />
                </span>
                @endif
                <span class="nav-link-title">
                    {{ $helper->getLocaleNativeName($locale) }}
                </span>
            </a>
        </li>
        @endforeach
    </ul>
</li>