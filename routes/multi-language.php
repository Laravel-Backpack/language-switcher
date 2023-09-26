<?php

use Backpack\MultiLanguage\Http\Controllers\MultiLanguageController;

/*
|--------------------------------------------------------------------------
| Backpack\MultiLanguage Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the Backpack\MultiLanguage package.
|
*/
Route::group([
    'namespace' => 'Backpack\MultiLanguage\Http\Controllers',
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin'), 'throttle:60,1'],
], function () {
    // set locale
    Route::any('set-locale/{locale}', [MultiLanguageController::class, 'setLocale'])
        ->where('locale', '[a-z]{2}(-[a-zA-Z]{2})?')
        ->name('multi-language.locale');
});
