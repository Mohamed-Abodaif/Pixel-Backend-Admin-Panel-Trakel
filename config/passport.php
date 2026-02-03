<?php

use Laravel\Passport\Passport;

/*
| Env key names below must match PixelPassportManager::ENV_KEY_* constants
| (single source of truth for key names is PixelPassportManager; config uses
| literals to avoid loading that class when config is read e.g. during dump-autoload).
*/

return [

    /*
    |--------------------------------------------------------------------------
    | Encryption Keys
    |--------------------------------------------------------------------------
    |
    | Passport uses encryption keys while generating secure access tokens for
    | your application. By default, the keys are stored as local files but
    | can be set via environment variables when that is more convenient.
    |
    */

    'private_key' => env('PASSPORT_PRIVATE_KEY'),

    'public_key' => env('PASSPORT_PUBLIC_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Client UUIDs
    |--------------------------------------------------------------------------
    |
    | By default, Passport uses auto-incrementing primary keys when assigning
    | IDs to clients. However, if Passport is installed using the provided
    | --uuids switch, this will be set to "true" and UUIDs will be used.
    |
    */

    'client_uuids' => false,

    /*
    |--------------------------------------------------------------------------
    | Personal Access Client
    |--------------------------------------------------------------------------
    |
    | If you enable client hashing, you should set the personal access client
    | ID and unhashed secret within your environment file. The values will
    | get used while issuing fresh personal access tokens to your users.
    |
    */

    'personal_access_client' => [
        'id' => env('PASSPORT_CENTRAL_PERSONAL_ACCESS_CLIENT_ID'),
        'secret' => env('PASSPORT_CENTRAL_PERSONAL_ACCESS_CLIENT_SECRET'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Passport Storage Driver
    |--------------------------------------------------------------------------
    |
    | This configuration value allows you to customize the storage options
    | for Passport, such as the database connection that should be used
    | by Passport's internal database models which store tokens, etc.
    |
    */

    'storage' => [
        'database' => [
            'connection' => null,
        ],
    ],
    "access_token_expiration_days_count" => 15,
    "expired_access_token_keeping_days_count" => 15,
    "personal_access_token_expiration_days_count" => 15,
    "refresh_token_expiration_days_count" => 15,
        
    /*
    |--------------------------------------------------------------------------
    | Refresh Token Grace Period
    |--------------------------------------------------------------------------
    |
    | This value defines how long *after* an access token expires, its associated
    | refresh token is still allowed to be used. After this grace period, the
    | refresh token should be deleted or ignored.
    |
    */
    'refresh_token_grace_period' => env('PASSPORT_REFRESH_GRACE_PERIOD', '10 days'),

    /*
    |--------------------------------------------------------------------------
    | Revoked Token Grace Period
    |--------------------------------------------------------------------------
    |
    | This value defines how long revoked access tokens can stay in the database
    | before being permanently deleted. Useful for audit or temporary revocation.
    |
    */
    'revoked_token_grace_period' => env('PASSPORT_REVOKED_GRACE_PERIOD', '10 days'),
    'server-app-client-credentials' => [
        'id' => env('SERVER_APP_CLIENT_CREDENTIALS_ID'),
        'secret' => env('SERVER_APP_CLIENT_CREDENTIALS_SECRET'),
    ],
    'machine_client_credentials_client' => [
        'id' => env('MACHINE_CLIENT_CREDENTIALS_CLIENT_ID'),
        'secret' => env('MACHINE_CLIENT_CREDENTIALS_CLIENT_SECRET'),
    ],
];
