<?php

use Backpack\LanguageSwitcher\Http\Controllers\LanguageSwitcherController;

/*
|--------------------------------------------------------------------------
| Backpack\LanguageSwitcher Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the Backpack\LanguageSwitcher package.
|
*/
Route::group([
    'namespace' => 'Backpack\LanguageSwitcher\Http\Controllers',
    'middleware' => ['web', 'throttle:60,1'],
], function () {
    // set locale
    Route::any('set-locale/{locale}', [LanguageSwitcherController::class, 'setLocale'])
        ->name('language-switcher.locale');
});
