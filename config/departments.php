<?php


return [
    'departments' =>  [
        ['name' => 'IT', 'status' => 1, 'is_default' => 1],
        ['name' => 'HR', 'status' => 1, 'is_default' => 1],
        ['name' => 'Facility', 'status' => 1, 'is_default' => 0],
        ['name' => 'Maintenance', 'status' => 1, 'is_default' => 0],
        ['name' => 'Electric', 'status' => 1, 'is_default' => 0],
        ['name' => 'Mechanical', 'status' => 1, 'is_default' => 0],
        ['name' => 'Civil', 'status' => 1, 'is_default' => 0],
        ['name' => 'Environment', 'status' => 1, 'is_default' => 0],
    ],
    

    /*
    |--------------------------------------------------------------------------
    | Department Roles Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for department-based role authorization.
    | Department Roles define a user's position/function within a department
    | (e.g., manager, engineer, representative).
    |
    | Department Roles: Define a user's position/function within a department
    |                   Examples: manager, engineer, representative
    | 
    | Application Roles: Define a user's permissions in the system
    |                    Examples: admin, user (stored in role_id column)
    |
    */

    'pixel-department-roles' =>   [

        /*
        |--------------------------------------------------------------------------
        | Default Department Name
        |--------------------------------------------------------------------------
        |
        | The default department name to use in policies when no specific
        | department is specified. This can be overridden in child policies.
        |
        */
    
        'default_department_name' => 'IT',
        
        /*
        |--------------------------------------------------------------------------
        | Default Department Roles
        |--------------------------------------------------------------------------
        |
        | These are the standard department roles that come pre-configured.
        | Each role includes:
        | - relation: The Eloquent relationship name (e.g., 'managers')
        | - dep_role_value: The value stored in the 'dep_role' column
        | - view_as_constant_prefix: Prefix for ViewAs constants
        | - enabled: Whether this role is active in the system
        | - can_be_disabled: Whether this role can be turned off
        |
        */
    
        'default_roles' => [
            'manager' => [
                'relation' => 'managers',
                'dep_role_value' => 'manager',
                'view_as_constant_prefix' => 'MANAGER',
                'label' => 'Manager',
                'enabled' => true,
                'can_be_disabled' => false, // Core role, cannot be disabled
            ],
            'rep' => [
                'relation' => 'reps',
                'dep_role_value' => 'rep',
                'view_as_constant_prefix' => 'REP',
                'label' => 'Representative',
                'enabled' => true,
                'can_be_disabled' => false, // Core role, cannot be disabled
            ],
        ],
     
    
        /*
        |--------------------------------------------------------------------------
        | Department Role Validation
        |--------------------------------------------------------------------------
        |
        | Validation rules for the dep_role column
        |
        */
    
        'validation' => [
            // Maximum length for dep_role column
            'max_length' => 50,
    
            // Whether to allow null values
            'nullable' => true,
    
            // Custom validation rules (Laravel validation format)
            'rules' => [
                'string',
                'max:50',
                'nullable',
            ],
        ],
    
        /*
        |--------------------------------------------------------------------------
        | Department Specific Settings
        |--------------------------------------------------------------------------
        |
        | Configure which roles are available for specific department types
        | This allows different departments to have different role sets
        |
        */
    
        'department_specific_roles' => [
            'IT' => ['manager', 'rep'],
            'HR' => ['manager', 'rep'],
            
        ],
    
        /*
        |--------------------------------------------------------------------------
        | Role Hierarchy
        |--------------------------------------------------------------------------
        |
        | Define the hierarchy of department roles for permission inheritance
        | Higher numbers = more authority
        |
        */
    
        'hierarchy' => [
            'manager' => 100,
            'engineer' => 50,
            'rep' => 30,
            // Custom roles should be added here with appropriate levels
        ],
    
        /*
        |--------------------------------------------------------------------------
        | Integration Settings
        |--------------------------------------------------------------------------
        */
    
        'integration' => [ 
            // Whether to cache role configurations
            'cache_enabled' => true,
            'cache_ttl' => 3600, // 1 hour 
        ],
    ]
    
 ];
    
     