<?php

/**
 * @category    Config
 * @package     Config
 * @author      Diego Rodrigo <diegorodrigo90@gmail.com>
 */

return [
    'authors' => [
        'base_uri' => env('AUTHORS_SERVICE_BASE_URL'),
        'secret' => env('AUTHORS_SERVICE_SECRET'),
    ],
    'books' => [
        'base_uri' => env('BOOKS_SERVICE_BASE_URL'),
        'secret' => env('BOOKS_SERVICE_SECRET'),
    ],
    'key' => env('APP_KEY'),
    'cipher' => env('APP_CIPHER'),
];
