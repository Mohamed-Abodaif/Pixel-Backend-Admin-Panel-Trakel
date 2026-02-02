<?php

use App\Policies\CompanyManagementPolicies\CompanyManagementPolicy;
use PixelApp\Models\CompanyModule\PixelCompany\PixelCompany;
use PixelApp\Models\CompanyModule\TenantCompany;
use PixelApp\Models\SystemConfigurationModels\Area;
use PixelApp\Models\SystemConfigurationModels\Branch;
use PixelApp\Models\SystemConfigurationModels\CountryModule\GeographicalArea;
use PixelApp\Models\SystemConfigurationModels\CountryModule\City;
use PixelApp\Models\SystemConfigurationModels\CountryModule\Country;
use PixelApp\Models\SystemConfigurationModels\Currency;
use PixelApp\Models\SystemConfigurationModels\Department;
use PixelApp\Models\SystemConfigurationModels\RoleModel;
use App\Models\UsersModule\User;
use PixelApp\Models\UsersModule\Signature;
use PixelApp\Models\UsersModule\UserProfile;
use PixelApp\Policies\AuthenticationPolicies\CompanyModulePolicies\CompanyModulePolicy;
use PixelApp\Policies\IndependentGates\SuperAdminIndependentGates;
use PixelApp\Policies\SystemConfigurationPolicies\DropDownListPolicies\GeographicalAreaPolicy;
use PixelApp\Policies\SystemConfigurationPolicies\DropDownListPolicies\BranchPolicy;
use PixelApp\Policies\SystemConfigurationPolicies\DropDownListPolicies\DepartmentPolicy;
use PixelApp\Policies\SystemConfigurationPolicies\DropDownListPolicies\CityPolicy;
use PixelApp\Policies\SystemConfigurationPolicies\DropDownListPolicies\CurrencyPolicy;
use PixelApp\Policies\SystemConfigurationPolicies\DropDownListPolicies\CountryPolicy;
use PixelApp\Policies\SystemConfigurationPolicies\DropDownListPolicies\MainAndSubAreaPolicy;
use PixelApp\Policies\SystemConfigurationPolicies\RolesAndPermissionsPolicies\RolesAndPermissionsPolicies;
use PixelApp\Policies\UserAccountPolicies\SignaturePolicy;
use PixelApp\Policies\UserAccountPolicies\UserProfilePolicy;
use PixelApp\Policies\UserManagementPolicies\UsersModulePolicy;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return [

    "policies" => [
 
        /** System Configuration Policies */
        Role::class => RolesAndPermissionsPolicies::class,
        RoleModel::class => RolesAndPermissionsPolicies::class,
        Permission::class => RolesAndPermissionsPolicies::class,

        /** DropDownList Policies */
        Department::class                 => DepartmentPolicy::class,
        GeographicalArea::class           => GeographicalAreaPolicy::class,
        Area::class                       => MainAndSubAreaPolicy::class,
        Branch::class                     => BranchPolicy::class,
        City::class                       => CityPolicy::class,
        Currency::class                   => CurrencyPolicy::class,
        Country::class                    => CountryPolicy::class,
       
        /** Authentication Policies */
        PixelCompany::class                => CompanyManagementPolicy::class,
        User::class                         => UsersModulePolicy::class,
        UserProfile::class                  => UserProfilePolicy::class,
        Signature::class                    => SignaturePolicy::class
    ],
    "independent_gates" => [
        SuperAdminIndependentGates::class
    ] 
];
