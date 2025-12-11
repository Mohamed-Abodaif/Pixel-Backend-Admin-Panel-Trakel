<?php

    $baseTables = [
        'users',
        'user_profile',
        'user_attachments',
        'migrations',
        'oauth_clients',
        'oauth_personal_access_clients',
        'oauth_access_tokens',
        'oauth_refresh_tokens',
        'countries',
        'cities',
        'geographical_areas',
        'currencies',
        'settings',
        'permissions',
        'company_account',
    ];

    return [
        'full' => $baseTables,
        'partial' => array_merge($baseTables, [
            'branches',
            'departments',
            'roles',
            'role_has_permissions'
        ]),
    ];
