<?php

use App\Models\CompanyModule\TenantCompany;
use App\Models\UsersModule\User; 

 return [
          'pixel-app-type' => 'admin-panel-app',
          "tenant-app-root-api" => env( 'TENANT_ROOT_API' ,  "http://127.0.0.1:8000"),
          'pixel-app-package-route-registrars' => 
          [
            'company-auth' => 'PixelApp\\Routes\\RouteRegistrarTypes\\AuthenticationRoutesRegistrars\\CompanyAuthenticationAPIRoutesRegistrar',
            'user-auth' => 'PixelApp\\Routes\\RouteRegistrarTypes\\AuthenticationRoutesRegistrars\\UserAuthenticationAPIRoutesRegistrar',
            'normal-company-profile' => 'PixelApp\\Routes\\RouteRegistrarTypes\\CompanyAccountRouteRegistrars\\NormalCompanyAccountRouteRegistrars\\NormalCompanyProfileAPIRoutesRegistrar',
            'normal-company-settings' => 'PixelApp\\Routes\\RouteRegistrarTypes\\CompanyAccountRouteRegistrars\\NormalCompanyAccountRouteRegistrars\\NormalCompanySettingsAPIRoutesRegistrar',
            'tenant-company-profile' => 'PixelApp\\Routes\\RouteRegistrarTypes\\CompanyAccountRouteRegistrars\\TenantCompanyAccountRouteRegistrars\\TenantCompanyProfileAPIRoutesRegistrar',
            'dropdown-list' => 
            [
              'main-and-sub-areas' => \PixelApp\Routes\RouteRegistrarTypes\SystemConfigurationRouteRegistrars\DropdownListRouteRegistrars\MainAndSubAreasRouteRegistrar::class,
              'geographical-areas' => \PixelApp\Routes\RouteRegistrarTypes\SystemConfigurationRouteRegistrars\DropdownListRouteRegistrars\GeographicalAreasRouteRegistrar::class,
              'branches' => 'PixelApp\\Routes\\RouteRegistrarTypes\\SystemConfigurationRouteRegistrars\\DropdownListRouteRegistrars\\BranchesRouteRegistrar',
              'cities' => 'PixelApp\\Routes\\RouteRegistrarTypes\\SystemConfigurationRouteRegistrars\\DropdownListRouteRegistrars\\CitiesRouteRegistrar',
              'countries' => 'PixelApp\\Routes\\RouteRegistrarTypes\\SystemConfigurationRouteRegistrars\\DropdownListRouteRegistrars\\CountriesRouteRegistrar',
              'currencies' => 'PixelApp\\Routes\\RouteRegistrarTypes\\SystemConfigurationRouteRegistrars\\DropdownListRouteRegistrars\\CurrenciesRouteRegistrar',
              'departments' => 'PixelApp\\Routes\\RouteRegistrarTypes\\SystemConfigurationRouteRegistrars\\DropdownListRouteRegistrars\\DepartmentRouteRegistrar',
            ],
            // 'packages' => 'PixelApp\\Routes\\RouteRegistrarTypes\\SystemConfigurationRouteRegistrars\\PackagesRouteRegistrar',
            'roles-permissions' => 'PixelApp\\Routes\\RouteRegistrarTypes\\SystemConfigurationRouteRegistrars\\RolesAndPermissionsRouteRegistrar',
            'user-profile' => 'PixelApp\\Routes\\RouteRegistrarTypes\\UserAccountRoutesRegistrars\\UserProfileAPIRoutesRegistrar',
            'signup-users-management' => 'PixelApp\\Routes\\RouteRegistrarTypes\\UsersManagementRoutesRegistrars\\SignUpUsersAPIRoutesRegistrar',
            'users-list-management' => 'PixelApp\\Routes\\RouteRegistrarTypes\\UsersManagementRoutesRegistrars\\UsersAPIRoutesRegistrar',
          ],
          /**
             * it only will be used on tenancy supporter app only (not normal app)
             * any alternative ServiceProvider must be a child class of 
             * PixelApp\ServiceProviders\RelatedPackagesServiceProviders\TenancyServiceProvider
             */
            'pixel-tenancy-service-provider-class' => 'PixelApp\\ServiceProviders\\RelatedPackagesServiceProviders\\TenancyServiceProvider',

            "tenant-company-model-class" => TenantCompany::class,
            "user-model-class" => User::class,
            
    /**
     * Optional Relations Configuration
     * Maps functionality keys to their config paths and table names
     * Used by OptionalRelationRuntimeCache for runtime checking
     */
    "optional-relations" => [
      'branches' => [
          'config_path' => 'pixel-app-package-route-registrars.dropdown-list.branches',
          'table' => 'branches',
      ],
      'departments' => [
          'config_path' => 'pixel-app-package-route-registrars.dropdown-list.departments',
          'table' => 'departments',
      ],
      'cities' => [
          'config_path' => 'pixel-app-package-route-registrars.dropdown-list.cities',
          'table' => 'cities',
      ],
      'countries' => [
          'config_path' => 'pixel-app-package-route-registrars.dropdown-list.countries',
          'table' => 'countries',
      ],
      'geographical-areas' => [
          'config_path' => 'pixel-app-package-route-registrars.dropdown-list.geographical-areas',
          'table' => 'geographical_areas',
      ],
      'main-and-sub-areas' => [
          'config_path' => 'pixel-app-package-route-registrars.dropdown-list.main-and-sub-areas',
          'table' => 'areas',
      ],
      'currencies' => [
          'config_path' => 'pixel-app-package-route-registrars.dropdown-list.currencies',
          'table' => 'currencies',
      ],
      'user-signatures' => [
          'config_path' => 'pixel-app-package-route-registrars.user-account.user-signatures',
          'table' => 'user_signatures',
      ],
  ]
            
];