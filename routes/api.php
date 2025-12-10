<?php

use App\Models\CompanyModule\TenantCompany;
use App\Models\UsersModule\User;
use App\Services\CompanyModule\StatusChangerServices\CompanyTypeStatusChangers\SignUpCompanyStatusChangerServices\SignUpAccountApprovingService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use PixelApp\Helpers\PixelGlobalHelpers;
use PixelApp\Models\SystemConfigurationModels\Branch;
use PixelApp\Models\SystemConfigurationModels\Department;

PixelGlobalHelpers::requirePhpFiles(__DIR__ . '/CompanyModule'); 
 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

Route::get("test" , function()
{
    return Http::baseUrl("api.stg.companies-management.com")
    ->get("api/test");


// جلب كل السجلات من جدول jobs
// $jobs = DB::table('failed_jobs')->latest('id')->first();

// dd($jobs);


// $user = new User();

// $user->name               = "first admin";
// $user->email              = "admin@pixel.com";
// $user->password           = Hash::make(123456789);
// $user->first_name         = "first";
// $user->last_name          = "admin";
// $user->mobile             = "224324";
// $user->hashed_id          = "4fsd4-4aa4-42cc-rter";
// $user->user_type          = "user";
// $user->email_verified_at  = now();
// $user->accepted_at        = now();
// $user->department_id      = 1;
// $user->status             = "active";
// $user->default_user       = 1;
// $user->role_id            = 1;
// $user->branch_id          = 1;

// $user->save();

    $company = TenantCompany::first();
    
    $company->data = [];

    $company->save();
 
//     (new SignUpAccountApprovingService(1))->approve();

    return $company;

    return response()->json([
        "test" => "Hello"
    ]);
    dd(Hash::make('123456789'));
    // $data = CompanyDefaultAdmin::first();
    // $registrableAdmin = (new RegistrableUserFactory($data->toArray()))->makeUser();
    // // dd( $registrableAdmin->toArray() );


    // $approved = (new RegistrableDefaultSuperAdminApprover($data))->approveAdmin();
    // dd( $approved->toArray() );
});

Route::get('Unauthorized', function () {
    return response()->json(['message' => 'Unauthorized'], 401);
})->middleware('reqLimit');
 
 