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
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin'), 'throttle:60,1'],
], function () {
    // set locale
    Route::any('set-locale/{locale}', [LanguageSwitcherController::class, 'setLocale'])
        ->where('locale', '[a-z]{2}(-[a-zA-Z]{2})?')
        ->name('language-switcher.locale');
});
