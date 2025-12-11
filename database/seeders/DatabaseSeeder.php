<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use PixelApp\CustomLibs\PixelCycleManagers\PixelAppBootingManagers\PixelAppBootingManager;
use PixelApp\Database\Seeders\GeneralSeeders\AllLocationDataDatabaseSeeder;
use PixelApp\Database\Seeders\GeneralSeeders\BaseDropDownListModulesSeeder;
use PixelApp\Database\Seeders\GeneralSeeders\CompanyAccountSeeder;
use PixelApp\Database\Seeders\GeneralSeeders\DefaultSuperAdminSeeder;
use PixelApp\Database\Seeders\SystemConfigSeeders\RolesAndPermissionsSeeders\PermissionsSeeder;
use PixelApp\Database\Seeders\SystemConfigSeeders\RolesAndPermissionsSeeders\RolesSeeder;

/**
 * This seeder can be used on central context of monolith app , normal app , admin panel app
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(! $this->doesAppNeedsCentralDBPermissions())
        {
            return ;
        }
        
        $this->call([
            AllLocationDataDatabaseSeeder::class,
            CompanyAccountSeeder::class,
            BaseDropDownListModulesSeeder::class,            
            PermissionsSeeder::class,
            RolesSeeder::class,
            DefaultSuperAdminSeeder::class
        ]);
    }

    /**
     * Once this seeder is run on central app 
     * it is not necessary for tenant app typed application  ... and maybe will be run accidentally and getting failure
     * In tenant app typed application central context 's database is only used for jobs or similar things
     */
    protected function doesAppNeedsCentralDBPermissions() : bool
    {
        return !PixelAppBootingManager::isBootingForTenantApp();
    }
}
