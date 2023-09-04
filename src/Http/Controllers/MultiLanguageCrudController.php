<?php

namespace Backpack\MultiLanguage\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;

/**
 * Class MultiLanguageCrudController
 * @package Backpack\MultiLanguage\Http\Controllers
 */
class MultiLanguageCrudController extends Controller
{
    /**
     * Set's the app locale
     */
    public function setLocale(string $locale): Redirector | RedirectResponse
    {
        if (in_array($locale, config('backpack.multi-language.locales'))) {
            Session::put('backpack.multi-language.locale', $locale);
        }

        return redirect(url()->previous());
    }
}
