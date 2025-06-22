<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Vite Asset URL
    |--------------------------------------------------------------------------
    |
    | This is the base URL for accessing assets built by Vite. In production,
    | you typically don't need to change this. It works with the default
    | Laravel public path and build folder.
    |
    */

    'asset_url' => env('ASSET_URL', null),

    /*
    |--------------------------------------------------------------------------
    | Vite Manifest Path
    |--------------------------------------------------------------------------
    |
    | This is the location of the Vite `manifest.json` file.
    | Make sure you run `npm run build` and the build folder is uploaded.
    |
    */

    'manifest_path' => public_path('build/manifest.json'),

    /*
    |--------------------------------------------------------------------------
    | Dev Server Settings
    |--------------------------------------------------------------------------
    |
    | This is only used in local development (Vite dev server).
    | Since you're in production, this will be ignored.
    |
    */

    'dev_server' => [
        'url' => env('VITE_DEV_SERVER_URL', 'http://localhost:5173'),
        'enabled' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Build Directory
    |--------------------------------------------------------------------------
    |
    | The folder inside /public that contains Vite build output.
    | Default is 'build', e.g. public/build/
    |
    */

    'build_directory' => 'build',
];