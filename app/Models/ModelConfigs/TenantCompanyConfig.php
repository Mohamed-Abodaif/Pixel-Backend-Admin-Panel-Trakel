<?php 

namespace App\Models\ModelConfigs;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\AllowedFilter;

class TenantCompanyConfig
{
    public static function getIndexingFilters() : array
    {
        return["name" , "sector" , "domain" , "status" , "company_id"] ;
    }

    public static function getSignupListFilters(): array
    {
        return [
            AllowedFilter::callback('name', function (Builder $query, $value) {

                    $query->where('name', 'like', "{$value}%")
                        ->orWhere('name_shortcut', 'like', "{$value}%")
                        ->orWhere('domain', 'like', "{$value}%")
                        ->orWhere('company_id', 'like', "{$value}%");
            }),

            AllowedFilter::callback("contact_no" , function(Builder $query , $value)
            {
                $query->orWhereHas('contacts', function ($query) use ($value) {
                    $query->where('contact_No', 'like', "{$value}%");
                });
            }),
            
            AllowedFilter::callback("admin_name" , function(Builder $query , $value)
            {
                $query->orWhereHas('defaultAdmin', function ($query) use ($value) {
                    $query->orHhere('first_name', 'like', "%" . $value . "%")
                          ->orWhere('last_name', 'like', "%" . $value . "%") ;
                });
            }),
            
            AllowedFilter::callback("admin_email" , function(Builder $query , $value)
            {
                $query->orWhereHas('defaultAdmin', function ($query) use ($value) {
                    $query->where('email', 'like', "%" . $value . "%");
                });
            }),
            AllowedFilter::exact('status')
        ];
    }

    
    public static function getCompanyListFilters(): array
    {
        return array_merge(
            static::getSignupListFilters(),
            [
                'branches_no',
                'employees_no',
                AllowedFilter::callback('package_status' , function(Builder $query , $value)
                {
                    $query->whereHas("package" , function($query) use($value)
                    {
                        $query->where("status" , $value);
                    });
                })
            ]
        );
    }

}