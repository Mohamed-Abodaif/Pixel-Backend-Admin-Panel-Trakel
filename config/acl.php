<?php

$permissions = [
                    "read_dashboard",
                    "read_tasks",
                    //////////Profile///////////
                    "read_profile",
                    "edit_profile",
                    /////////Signature/////////
                    "read_Signature",
                    "create_Signature",
                    "edit_Signature",
                    "delete_Signature",
                ];
 
$superAdminPermissions = array_merge($permissions, [
                    // ========================================
                    // SYSTEM CONFIGURATION (SC) MODULE
                    // ========================================
                    "read_sc-dropdown-lists",
                    "create_sc-dropdown-lists",
                    "edit_sc-dropdown-lists",
                    "delete_sc-dropdown-lists",
                    // Dropdown Lists - Branches
                    "read_sc-dropdown-lists-branches",
                    "create_sc-dropdown-lists-branches",
                    "edit_sc-dropdown-lists-branches",
                    "delete_sc-dropdown-lists-branches",
                    
                    // Dropdown Lists - Departments
                    "read_sc-dropdown-lists-departments",
                    "create_sc-dropdown-lists-departments",
                    "edit_sc-dropdown-lists-departments",
                    "delete_sc-dropdown-lists-departments",

                    // Dropdown Lists - Branch Teams
                    "read_sc-dropdown-lists-branches-teams",
                    "manage-team-members_sc-dropdown-lists-branches-teams",
                    
                    // Dropdown Lists - Cities
                    "read_sc-dropdown-lists-cities",
                    "create_sc-dropdown-lists-cities",
                    "edit_sc-dropdown-lists-cities",
                    "delete_sc-dropdown-lists-cities",
                    
                    // Dropdown Lists - Countries
                    "read_sc-dropdown-lists-countries",
                    "edit_sc-dropdown-lists-countries",
                    
                    // Dropdown Lists - Currencies
                    "read_sc-dropdown-lists-currencies",
                    "import_sc-dropdown-lists-currencies",
                    "edit_sc-dropdown-lists-currencies",
                    
                    // Dropdown Lists - Geographical Areas
                    "read_sc-dropdown-lists-geographical-areas",
                    "create_sc-dropdown-lists-geographical-areas",
                    "edit_sc-dropdown-lists-geographical-areas",
                    "delete_sc-dropdown-lists-geographical-areas",
                    
                    // Dropdown Lists - Main Areas
                    "read_sc-dropdown-lists-main-areas",
                    "create_sc-dropdown-lists-main-areas",
                    "edit_sc-dropdown-lists-main-areas",
                    "delete_sc-dropdown-lists-main-areas",
                    
                    // Dropdown Lists - Sub Areas
                    "read_sc-dropdown-lists-sub-areas",
                    "create_sc-dropdown-lists-sub-areas",
                    "edit_sc-dropdown-lists-sub-areas",
                    "delete_sc-dropdown-lists-sub-areas",
                    
                    // Dropdown Lists - Departments (Additional)
                    "department-rep_sc-dropdown-lists-departments",
                    
                    
                    // Roles and Permissions
                    "read_sc-roles-and-permissions",
                    "create_sc-roles-and-permissions",
                    "edit_sc-roles-and-permissions",
                    "delete_sc-roles-and-permissions",
                    // ========================================
                    // USER MANAGEMENT MODULE (UMM)
                    // ========================================
                    // Signup List Management
                    "read_umm-signup-list",
                    "edit_umm-signup-list",
                    "delete_umm-signup-list",
                    "approve_umm-signup-list",
                    "reject_umm-signup-list",
                    "re-verify_umm-signup-list",
                    "reverification_umm-signup-list",
                    "edit-email_umm-signup-list",
                    // Users List Management
                    "read_umm-users-list",
                    "edit_umm-users-list",
                    "delete_umm-users-list",
                    
                    // Company Account Management (Super Admin Only)
                    "reset-data_company-account",
                    "read_company-account",
                    "edit_company-account",
                    "change-admin-email_company-account",

                    // Company Management (Super Admin Only)
                    "read_signup_companies",
                    "read_approved_companies",
                    "edit_signup_companies",
                    "edit_approved_companies",
                    "approve_signup_company",
                    "reject_signup_company",
                    "change_approved_company_status"
]);

return [
    'permissions' => [
        "Super_Admin" => $superAdminPermissions,
        "Default_User" =>  $permissions,
    ],
    "default_roles" => [
                            "Super Admin",
                            "Default User",
                       ],
    "highestRole" => "Super Admin",
    "lowestRole" => "Default User"
];