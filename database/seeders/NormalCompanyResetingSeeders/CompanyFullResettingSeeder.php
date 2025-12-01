<?php

namespace Database\Seeders\NormalCompanyResetingSeeders;

use Illuminate\Database\Seeder;
use PixelApp\Database\Seeders\SystemConfigSeeders\DropdownListSeeders\BranchesSeeder;
use PixelApp\Database\Seeders\SystemConfigSeeders\RolesAndPermissionsSeeders\PermissionsSeeder;
use PixelApp\Database\Seeders\SystemConfigSeeders\RolesAndPermissionsSeeders\RolesSeeder;

/**
 * This seeder can be used when a normal app company want to execute a  full reset data
 * NOT ON NEW PROJECT SETUP PROCESS
 */
class CompanyFullResettingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionsSeeder::class,
            RolesSeeder::class,
            BranchesSeeder::class
        ]);
    }
}
