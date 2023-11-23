# Language Switcher

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![The Whole Fruit Manifesto](https://img.shields.io/badge/writing%20standard-the%20whole%20fruit-brightgreen)](https://github.com/the-whole-fruit/manifesto)


This package adds a Language Switcher dropdown for projects using [Backpack for Laravel](https://backpackforlaravel.com/).

## Preview

<img src="https://github.com/Laravel-Backpack/activity-log/assets/1838187/abdb196f-1d41-4b14-9dc5-2ac7c64cc84d" width="361" height="257" />

## Demo

Try it right now, in [our online demo](https://demo.backpackforlaravel.com/admin/).

## Installation

1) In your Laravel project, install this package:

```bash
composer require backpack/language-switcher

# optional: publish the config file
php artisan vendor:publish --provider="Backpack\LanguageSwitcher\LanguageSwitcherServiceProvider" --tag="config"
```

2) Add the middleware to backpack config `config/backpack/base.php`:
```php
'middleware_class' => [
    ...
    \Backpack\LanguageSwitcher\Http\Middleware\LanguageSwitcherMiddleware::class,
],
```
_Optionally, you may add the middleware to the `web`, `api` or other middleware groups where you may want to use the language switcher, in `app/Http/Kernel.php`._


3) Add the dropdown view to `topbar_right_content.blade.php` or wherever you need it:

```php
@include('backpack.language-switcher::language-switcher')
```

4) In order to add the available languages of your app, you'll need to enable them in the backpack crud config file `config/backpack/crud.php`

```bash
'locales' => [
    'en' => 'English',
    'pt' => 'Portuguese',
    'ro' => 'Romanian',
    ...
```

There you can set the array of `locales` your app uses.  Keep in mind the default locale of your app should remain in `config.app.locale` and `config.app.fallback_locale`.

## Usage

### Can I show/hide the main label or flags?
**Yes!**  
You can do it by sending special arguments to the component:

```php
@include('backpack.language-switcher::LanguageSwitcher', [
    'flags' => true, // true by default, change it to hide flags
    'main_label' => false, // false by default, it may also be a string, for instance "Language"
])
```

### Can I use this package outside of the backpack/admin scope?
**Yes!**  
If you wish to use the language switcher on other parts of your app, you can do it by adding the middleware in `app/Http/Kernel.php`.
You can, for instance, enable this for the whole `web` middleware group, or the `api`.

```php
protected $middlewareGroups = [
    'web' => [
        ...
        \Backpack\LanguageSwitcher\Http\Middleware\LanguageSwitcherMiddleware::class,
    ],
```

### Can I customize the endpoint routes ? 
**Yes!**
You can do it by publishing the config file `php artisan vendor:publish --provider="Backpack\LanguageSwitcher\LanguageSwitcherServiceProvider" --tag="config"`.
There you can totally disable the package route and register your own, or change some behavior related with display urls.

Please take caution to protect the endpoint with throttling or any other security measure if you overwrite the routes. The default package route uses: `'throttle:60,1'`

## Notes

This package uses [`outhebox/blade-flags`](https://github.com/MohmmedAshraf/blade-flags) to get the flags representing languages/locales.

If you find any issue with any with it, like a missing or wrong flag, you can report directly to the maintainer.


## Security

If you discover any security related issues, please email cristian.tabacitu@backpackforlaravel.com instead of using the issue tracker.

## Credits

- [Antonio Almeida](https://github.com/promatik)
- [Cristian Tabacitu](https://github.com/tabacitu)
- [All Contributors][link-contributors]

## License

This project was released under MIT License, so you can install it on top of any Backpack & Laravel project. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/backpack/language-switcher.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/backpack/language-switcher.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/backpack/language-switcher
[link-downloads]: https://packagist.org/packages/backpack/language-switcher
[link-author]: https://github.com/backpack
[link-contributors]: ../../contributors
