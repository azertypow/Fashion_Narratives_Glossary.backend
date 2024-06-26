<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen.
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */

use Kirby\Cms\Page;

return [
    'debug' => true,

    // CORS middleware
    'hooks' => [
        'route:before' => function () {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET');
//            header('Access-Control-Allow-Headers: Content-Type, Authorization');
        }
    ],

    'routes' => [
        [
            'pattern' => '/',
            'action'  => function () {
                go('/panel');
            }
        ],
    ],
    'panel' => [
        'css' => '_custom-panel/main.css',
    ],
];
