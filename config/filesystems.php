<?php

use CustomFileSystem\CustomFileHandler;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
             'serve' => true,
             'throw' => false,
             'report' => false,
        ],
        'front_separated' => [
            /**
             * - Use it when frontend is separated from backend but both on the same server
             * - Using it when they are server separated maybe not work ... Depends on the provided folder's path permissions
             * Where :
             * BACKEND_APP_URL : is the url to the backend 's laravel project
             *
             * Notes :
             * 1 - Don't forget to generate a shortcut link from storage folder => public folder in laravel backend project
             * 2 - The root and url values will be overwritten in tenant context after the tenancy is initialized
             * and will be returned t their old values after the tenancy is reverted
             * 3 - There is n differences between public and front_separated 's roots ... they will be used in the backend
             */
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' =>  rtrim(env('BACKEND_APP_URL') , "/") . '/public/storage',
            'visibility' => 'public',
//            'driver' => 'local',
//            'root' => storage_path('app/public'),
//            'url' =>  rtrim(env('BACKEND_APP_URL') , "/") . '/public/storage',
//            'visibility' => 'public',
        ],
        'public' => [
            /**
             * - Use it when frontend is mixed with backend in the same project
             * Where :
             * APP_URL : is the url to the laravel project's folder that found on the server
             * Notes :
             * 1 -Don't forget to generate a shortcut link from storage folder => public folder
             * 2 - The root and url values will be overwritten in tenant context after the tenancy is initialized
             * and will be returned t their old values after the tenancy is reverted
             * 3 - There is n differences between public and front_separated 's roots ... they will be used in the backend
             */
            'driver' => 'local',
            /**
             * @todo
             * for later : think about using CustomFileHandler::getFileStoragePath , it fails in runtime becasue it uses a facade before registering it
             */
            'root' => storage_path('app/public'),
            'url' =>  rtrim(env('BACKEND_URL') , "/") .  '/storage' ,
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
        ], 
        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],
        'gcs' => [
            'driver' => 'gcs',
            'key_file_path' => env('GOOGLE_CLOUD_KEY_FILE', base_path('service-account.json')), // optional: /path/to/service-account.json
            'key_file' => [], // optional: Array of data that substitutes the .json file (see below)
            'project_id' => env('GOOGLE_CLOUD_PROJECT_ID', 'airy-ripple-406513'), // optional: is included in key file
            'bucket' => env('GOOGLE_CLOUD_STORAGE_BUCKET', 'pixelbucket'),
            'path_prefix' => env('GOOGLE_CLOUD_STORAGE_PATH_PREFIX', ''), // optional: /default/path/to/apply/in/bucket
            'storage_api_uri' => env('GOOGLE_CLOUD_STORAGE_API_URI', null), // see: Public URLs below
            'apiEndpoint' => env('GOOGLE_CLOUD_STORAGE_API_ENDPOINT', null), // set storageClient apiEndpoint
            'visibility' => 'public', // optional: public|private
            'visibility_handler' => null, // optional: set to \League\Flysystem\GoogleCloudStorage\UniformBucketLevelAccessVisibility::class to enable uniform bucket level access
            'metadata' => ['cacheControl'=> 'public,max-age=86400'], // optional: default metadata
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
