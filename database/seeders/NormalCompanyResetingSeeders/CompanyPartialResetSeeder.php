<?php

namespace Database\Seeders\NormalCompanyResetingSeeders;

use Illuminate\Database\Seeder;


/**
 * This seeder can be used when a normal app company want to execute a partial reset data
 * NOT ON NEW PROJECT SETUP PROCESS
 */
class CompanyPartialResetSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //because of partial resetting .... there is no default seeder can be used here
        //run the project 's own seeder (normal app , central app , admin panel seeders)
        $this->call([
            
        ]);
    }
}
