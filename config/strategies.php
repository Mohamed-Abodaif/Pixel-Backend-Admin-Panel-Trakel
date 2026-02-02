<?php

use PixelApp\CustomLibs\CustomAuthorization\Strategies\Authorization\CreatorAuthorizationStrategy;
use PixelApp\CustomLibs\CustomAuthorization\Strategies\Authorization\SuperAdminAuthorizationStrategy;
use PixelApp\CustomLibs\CustomAuthorization\Strategies\QueryFilter\CreatorQueryFilterStrategy;
use PixelApp\CustomLibs\CustomAuthorization\Strategies\Authorization\DepartmentRoleAuthorizationStrategy;
use PixelApp\CustomLibs\CustomAuthorization\Strategies\Authorization\StaticValueAuthorizationStrategy;
use PixelApp\CustomLibs\CustomAuthorization\Strategies\QueryFilter\DepartmentRoleQueryFilterStrategy;
use PixelApp\CustomLibs\CustomAuthorization\Strategies\QueryFilter\NoOpQueryFilterStrategy;
use PixelApp\CustomLibs\CustomAuthorization\Strategies\QueryFilter\StopQueryQueryFilterStrategy;

return [
    /*
    |--------------------------------------------------------------------------
    | Strategies Configuration
    |--------------------------------------------------------------------------
    |
    | Defines authorization and query filter strategies.
    | These are used by ViewAsManager and DepartmentRolePermissionsResolver.
    |
    */
    'authorization' => [
        'static_allow' => StaticValueAuthorizationStrategy::class,
        'department_role' => DepartmentRoleAuthorizationStrategy::class,
        'creator_check' => CreatorAuthorizationStrategy::class,
    ],
    'query_filter' => [
        'no_op' => NoOpQueryFilterStrategy::class,
        'stop_query' => StopQueryQueryFilterStrategy::class,
        'department_role_filter' => DepartmentRoleQueryFilterStrategy::class,
        'super_admin_check' => SuperAdminAuthorizationStrategy::class,
        'creator_filter' => CreatorQueryFilterStrategy::class,
    ],
];
