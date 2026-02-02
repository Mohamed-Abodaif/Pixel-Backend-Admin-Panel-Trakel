<?php

return [
    /*
    |--------------------------------------------------------------------------
    | ViewAs Values Configuration
    |--------------------------------------------------------------------------
    |
    | Defines all viewAs values (static and department role-based) that can
    | be used in the application. Supports both static values (private, draft, published)
    | and dynamic department role values (HSE_Manager, HSE_Engineer, etc.)
    |
    | Dynamic values format: {department}_{role} (e.g., HSE_Manager, HR_Engineer)
    | Can also include branch ID: {branchId}_{department}_{role} (e.g., 2_HR_Manager)
    |
    */
    'static_values' => [
        // Creator role
        'creator' => [
            'label' => 'Creator',
            'type' => 'static',
            'authorization_strategy' => 'creator_check',
            'query_filter_strategy' => 'creator_filter',
        ],
        'super_admin' => [
            "label" => "Super Admin",
            "type" => "static",
            "authorization_strategy" => "super_admin_check",
            "query_filter_strategy" => "super_admin_filter",
        ]
    ],
    
    /*
    | Department Role-Based Values
    | These can be:
    | 1. Predefined (hr_manager, engineer_view)
    | 2. Dynamic (HSE_Manager, HSE_Engineer) - constructed from department + role
    */
    'department_role_values' => [ 
        'hq_hr_manager' => [
            'label' => 'HR Manager View',
            'type' => 'department_role',
            'roles' => ['manager'],
            'department' => 'HR',
            'scope' => 'hq',
            'authorization_strategy' => 'department_role',
            'query_filter_strategy' => 'department_role_filter',
        ] ,
        'hr_manager' => [
            'label' => 'HR Manager View',
            'type' => 'department_role',
            'roles' => ['manager'],
            'department' => 'HR',
            'scope' => 'branch',
            'authorization_strategy' => 'department_role',
            'query_filter_strategy' => 'department_role_filter',
        ] ,
        'hq_hr_rep' => [
            'label' => 'HR Rep View',
            'type' => 'department_role',
            'roles' => ['rep'],
            'department' => 'HR',
            'scope' => 'hq',
            'authorization_strategy' => 'department_role',
            'query_filter_strategy' => 'department_role_filter',
        ],
        'hr_rep' => [
            'label' => 'HR Rep View',
            'type' => 'department_role',
            'roles' => ['rep'],
            'department' => 'HR',
            'scope' => 'branch',
            'authorization_strategy' => 'department_role',
            'query_filter_strategy' => 'department_role_filter',
        ] ,
        'hq_it_manager' => [
            'label' => 'IT Manager View',
            'type' => 'department_role',
            'roles' => ['manager'],
            'department' => 'IT',
            'scope' => 'hq',
            'authorization_strategy' => 'department_role',
            'query_filter_strategy' => 'department_role_filter',
        ],
        'it_manager' => [
            'label' => 'IT Manager View',
            'type' => 'department_role',
            'roles' => ['manager'],
            'department' => 'IT',
            'scope' => 'branch',
            'authorization_strategy' => 'department_role',
            'query_filter_strategy' => 'department_role_filter',
        ],
        'hq_it_rep' => [
            'label' => 'IT Rep View',
            'type' => 'department_role',
            'roles' => ['rep'],
            'department' => 'IT',
            'scope' => 'hq',
            'authorization_strategy' => 'department_role',
            'query_filter_strategy' => 'department_role_filter',
        ],
        'it_rep' => [
            'label' => 'IT Rep View',
            'type' => 'department_role',
            'roles' => ['rep'],
            'department' => 'IT',
            'scope' => 'branch',
            'authorization_strategy' => 'department_role',
            'query_filter_strategy' => 'department_role_filter',
        ]
    ],
    
    'defaults' => [
        'authorization_strategy' => 'static_allow',
        'query_filter_strategy' => 'stop_query',
    ],
];
