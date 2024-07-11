<?php

/**
 * BG : blue, indigo, purple, pink, red, orange, yellow, green, teal, cyan, gray, gray-dark, black
 * Type : dark, light
 * Shadow : 0-4.
 */
return [
    'navbar'  => [
        'bg'     => 'white',
        'type'   => 'light',
        'right' => [
            'boilerplate::notifications.notification',
        ],
        'border' => true,
        'user'   => [
            'visible' => true,
            'shadow'  => 0,
        ],
    ],
    'sidebar' => [
        'type'    => 'light',
        'shadow'  => 4,
        'border'  => false,
        'compact' => false,
        'links'   => [
            'bg'     => 'blue',
            'shadow' => 1,
        ],
        'brand'   => [
            'bg'   => 'white',
            'logo' => [
                'bg'     => 'white',
                'icon'   => '<img src="/assets/vendor/boilerplate/images/vendor/bootstrap-fileinput/logo_fond_blanc-removebg-preview.png" alt="Logo" class="navbar-logo">',
                'text'   => '',
                'shadow' => 2,
            ],
        ],
        'user'    => [
            'visible' => false,
            'shadow'  => 2,
        ],
    ],
    'footer'  => [
        'visible'    => true,
        'vendorname' => 'PAP-FAMILY',
        'vendorlink' => '',
    ],
    'card'    => [
        'outline'       => true,
        'default_color' => 'info',
    ],
];
