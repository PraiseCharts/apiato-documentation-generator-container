<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Executable
    |--------------------------------------------------------------------------
    |
    | Specify how you run or access the `apidoc` tool on your machine.
    |
    */

    'executable' => 'node_modules/.bin/apidoc',

    /*
    |--------------------------------------------------------------------------
    | API Types
    |--------------------------------------------------------------------------
    |
    | The `types` helps generating multiple documentations, by grouping them
    | under types names. You can add or remove any type. By default
    | `public` and `private` types are set.
    |
    | url: The url to access that generated API documentation.
    |
    | routes: The route file to read when generating this documentation.
    |         Every route file will have the following name format:
    |         `{endpoint-name}.v{version-number}.{documentation-type}.php`.
    |
    */

    'types' => [
        'public' => [
            'url' => 'docs',
            'folder-name' => 'documentation/public', // doc folder name
            'routes' => [
                'public',
            ],
        ],

        'private' => [
            'url' => 'docs/private',
            'folder-name' => 'documentation/private', // doc folder name
            'routes' => [
                'private',
                'public',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | HTML files
    |--------------------------------------------------------------------------
    |
    | Specify where to put the generated HTML files.
    |
    */

	'html_files' => env('SRC_PATH', app()->path()) . '/Containers/' . config('documentation-container.section_name') . '/Documentation/UI/WEB/Views/',

    /*
    |--------------------------------------------------------------------------
    | Documentation container, section name
    |--------------------------------------------------------------------------
    |
    | Specify the Section name where the Documentation Container is located.
    |
    */
    'section_name' => 'VendorSection',

    /*
    |--------------------------------------------------------------------------
    | Protect private docs by auth:web middleware
    |--------------------------------------------------------------------------
    |
    | If enabled, users need to login and have proper roles/permissions to access private docs
    |
    */

    'protect-private-docs' => App::isProduction() // Private docs are protected while in production
];
