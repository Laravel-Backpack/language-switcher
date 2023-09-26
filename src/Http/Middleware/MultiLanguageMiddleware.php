<?php

namespace Backpack\MultiLanguage\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class MultiLanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $key = 'backpack.multi-language.locale';

        if (Session::has($key)) {
            App::setLocale(Session::get($key));
        } else {
            $availableLocales = array_keys(config('backpack.crud.locales'));
            $userLocales = preg_split('/,|;/', $request->server('HTTP_ACCEPT_LANGUAGE'));

            foreach ($userLocales as $locale) {
                if (in_array($locale, $availableLocales)) {
                    Session::put($key, $locale);
                    App::setLocale($locale);
                    break;
                }
            }
        }

        return $next($request);
    }
}
