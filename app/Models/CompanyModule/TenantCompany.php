<?php

namespace App\Models\CompanyModule;
 
use PixelApp\Models\SystemConfigurationModels\CountryModule\Country; 
use Illuminate\Database\Query\Builder;
use PixelApp\Models\CompanyModule\CompanyContact;
use Spatie\QueryBuilder\AllowedFilter; 
use PixelApp\Models\CompanyModule\TenantCompany as BaseTenantCompany; 
class TenantCompany extends BaseTenantCompany 
{  
    // const CONTRACTORAPPROVEDSTATUS = ['pending', 'approved', 'rejected'];
    // const MAINTENANTAPPROVEDSTATUS = ['pending', 'approved', 'rejected'];

    // public $fillable = [
    //     'name',
    //     'domain',
    //     'sector',
    //     'country_id',
    //     'logo',
    //     'mobile',
    //     'address',
    //     'employees_no',
    //     'branches_no',
    //     'status',
    //     'cr_no',
    //     'parent_id', 
    //     'package_status',
    //     'is_active',
    //     'dates',
    //     'billing_address',
    //     'nationality'
    // ]; 

    // public $exceptData = [
    //     'package_status',
    //     'is_active',
    //     'dates',
    //     'registration_status' 
    // ];

    // protected $casts = [
    //     "is_active" => "boolean",
    // ]; 
   
    // public static function getCustomColumns(): array
    // {
    //     return [
    //         'id',
    //         'company_id',
    //         'name',
    //         'domain',
    //         'sector',
    //         'country_id',
    //         'logo',
    //         'hashed_id',
    //         'status',
    //         'employees_no',
    //         'branches_no',
    //         'package_status',
    //         'mobile',
    //         'address',
    //         'active',
    //         'cr_no',
    //         'parent_id',
    //         'account_type',
    //         'created_at' ,
    //         'updated_at' ,
    //         'accepted_at',
    //         'deleted_at'
    //     ];
    // } 

  }
