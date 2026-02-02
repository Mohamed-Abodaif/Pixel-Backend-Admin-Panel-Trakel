<?php

namespace App\Models\UsersModule;

use PixelApp\Models\Interfaces\OptionalRelationsInterfaces\HasDepartmentRole;
use PixelApp\Models\Interfaces\OptionalRelationsInterfaces\BelongsToBranch;
use PixelApp\Models\Interfaces\OptionalRelationsInterfaces\BelongsToDepartment; 
use PixelApp\Models\UsersModule\PixelUser; 

class User extends PixelUser implements BelongsToBranch , BelongsToDepartment , HasDepartmentRole
{

    protected function getConfigDepartmentSpecificRoles(): array
    {
        return array_filter(parent::getConfigDepartmentSpecificRoles() , function( $departmentName)
        {
            return in_array($departmentName , ["HR" , "IT"]);
        } , ARRAY_FILTER_USE_KEY  );
    }
}
