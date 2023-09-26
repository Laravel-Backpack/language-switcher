<?php

namespace Backpack\LanguageSwitcher;

use Illuminate\Support\ServiceProvider;

class LanguageSwitcherServiceProvider extends ServiceProvider
{
    use AutomaticServiceProvider;

    protected $vendorName = 'backpack';
    protected $packageName = 'language-switcher';
    protected $commands = [];
}
