<?php

return [
    // when `false` developer should setup their own route for language switcher
    // check the default route at /vendor/backpack/language-switcher/routes/language-switcher.php
    'setup_routes' => true,

    // when true, if the page where the picker is displayed use the `backpack route prefix` in the route, 
    // we will also add the route prefix on the language-switcher route.
    // eg: https://your-application.com/admin/set-locale/{locale} and not https://your-application.com/set-locale/{locale} as default
    'use_backpack_route_prefix_on_admin_routes' => false,
];