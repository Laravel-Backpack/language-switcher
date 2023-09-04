<?php

use Backpack\MultiLanguage\Http\Controllers\MultiLanguageCrudController;

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
    Route::any('locale/{locale}', [MultiLanguageCrudController::class, 'setLocale'])
        ->where('locale', '[a-z]{2}(-[a-zA-Z]{2})?')
        ->name('multi-language.locale');
});
