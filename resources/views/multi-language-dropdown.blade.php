@inject('helper', 'Backpack\MultiLanguage\Helpers\MultiLanguageHelper')

<li class="nav-item me-2 dropdown multi-language">
    <a class="nav-link dropdown-toggle text-decoration-none" data-bs-toggle="dropdown" data-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" style="cursor: pointer">
        @if($flags ?? true)
        <span class="nav-link-icon" style="width: fit-content">
            <x-dynamic-component component="flag-{{ $helper->getFlagOrFallback($helper->getCurrentLocale()) }}" style="width: 1.5rem" />
        </span>
        @endif
        @if($main_label ?? false || (($flags ?? true) === false && !isset($main_label)))
        <span class="nav-link-title">
            {{ $helper->getLocaleNativeName() }}
        </span>
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-end" style="right: 0">
        @foreach(config('backpack.crud.locales', []) as $locale => $name)
        <li>
            <a class="dropdown-item {{ $locale === $helper->getCurrentLocale() ? 'active disabled' : '' }}" href="{{ route('multi-language.locale', $locale) }}">
                @if($flags ?? true)
                <span class="nav-link-icon" style="width: fit-content">
                    <x-dynamic-component component="flag-{{ $helper->getFlagOrFallback($locale) }}" style="width: 1.5rem" />
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
