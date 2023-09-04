<?php

namespace Backpack\MultiLanguage;

use Backpack\MultiLanguage\Http\Middleware\MultiLanguageMiddleware;
use Illuminate\Support\ServiceProvider;

class MultiLanguageServiceProvider extends ServiceProvider
{
    use AutomaticServiceProvider;

    protected $vendorName = 'backpack';
    protected $packageName = 'multi-language';
    protected $commands = [];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        // set multi language middleware
        foreach (config('backpack.multi-language.middleware-groups', []) as $group) {
            app('router')->pushMiddlewareToGroup($group, MultiLanguageMiddleware::class);
        }

        $this->autoboot();
    }
}
