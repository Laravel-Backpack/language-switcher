# Multi Language

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![The Whole Fruit Manifesto](https://img.shields.io/badge/writing%20standard-the%20whole%20fruit-brightgreen)](https://github.com/the-whole-fruit/manifesto)


This package adds a multi language dropdown for projects using [Backpack for Laravel](https://backpackforlaravel.com/).

## Preview

<img src="https://github.com/Laravel-Backpack/activity-log/assets/1838187/abdb196f-1d41-4b14-9dc5-2ac7c64cc84d" width="361" height="257" />

## Demo

Try it right now, in [our online demo](https://demo.backpackforlaravel.com/admin/).

## Installation

In your Laravel project, install this package:

```bash
composer require backpack/multi-language
```

Add the dropdown view to `topbar_right_content.blade.php` or wherever you need it,

```php
@include('backpack.multi-language::multi-language-dropdown')
```

In order to add the available languages of your app, you'll need to publish the 

```bash
php artisan vendor:publish --provider="Backpack\MultiLanguage\MultiLanguageServiceProvider" --tag=config
```

There you can set the array of `locales` your app uses.

## Usage

### Can I show/hide the main label or flags?
**Yes!**  
You can do it by sending special arguments to the component:

```php
@include('backpack.multi-language::multi-language-dropdown', [
    'flags' => true, // true by default, change it to hide flags
    'main_label' => false, // false by default, change it to show the current locale label
])
```

### Can I use this package outside of the backpack/admin scope?
**Yes!**  
If you wish to use the language setter on other parts of your app, you can do it by enabling the middlewares in the config `middleware-groups`.
You can enable this for the whole `web` middleware group, or the `api`.


## Notes

This package uses;
1) `outhebox/blade-flags` package to get the flags representing languages/locales.
2) `whitecube/lingua` to get the native language names.

If you found any issue with any of these, like a missing flag or a wrong native name, you can report directly on the maintainer repositories.


## Security

If you discover any security related issues, please email cristian.tabacitu@backpackforlaravel.com instead of using the issue tracker.

## Credits

- [Antonio Almeida](https://github.com/promatik)
- [Cristian Tabacitu](https://github.com/tabacitu)
- [All Contributors][link-contributors]

## License

This project was released under MIT License, so you can install it on top of any Backpack & Laravel project. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/backpack/multi-language.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/backpack/multi-language.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/backpack/multi-language
[link-downloads]: https://packagist.org/packages/backpack/multi-language
[link-author]: https://github.com/backpack
[link-contributors]: ../../contributors
