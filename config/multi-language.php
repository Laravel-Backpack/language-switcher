<?php

return [
    // push middleware to groups
    'middleware-groups' => [
        config('backpack.base.middleware_key', 'admin'), // backpack
        // 'web',
        // 'api',
    ],

    // app available locales
    'locales' => [
        'en',
        'pt',
    ],
];
