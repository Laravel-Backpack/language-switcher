<?php

namespace Backpack\MultiLanguage;

use Illuminate\Support\ServiceProvider;

class MultiLanguageServiceProvider extends ServiceProvider
{
    use AutomaticServiceProvider;

    protected $vendorName = 'backpack';
    protected $packageName = 'multi-language';
    protected $commands = [];
}
