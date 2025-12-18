<?php

use App\Models\CompanyModule\TenantCompany;
use App\Models\UsersModule\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use PixelApp\Helpers\PixelGlobalHelpers;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Client;
use PixelApp\CustomLibs\PixelCycleManagers\PixelAppsConnectionManagement\PixelAppClients\PixelTenantAppCentralDomainClient;
use PixelApp\CustomLibs\PixelCycleManagers\PixelAppsConnectionManagement\PixelAppRouteIdentifiers\PixelAppGetRouteIdentifier;
use PixelApp\CustomLibs\PixelCycleManagers\PixelAppsConnectionManagement\PixelAppsConnectionManager;


PixelGlobalHelpers::requirePhpFiles(__DIR__ . '/CompanyModule'); 

Route::get('/debug-middlewares', function (Illuminate\Http\Request $request) { 
    $route = $request->route(); 

    return response()->json([
        'uri' => $route->uri(),
        'middlewares' => $route->gatherMiddleware(),
    ]);
});

Route::get("test10" , function()
{

    // dd(Hash::make("vEyydpzWqcdnur9Oemh3lQcjCmkiCVednH2q8yRc"));
    // dd(password_verify(config("passport.personal_access_client.secret") , Client::first()->secret));

    // dd(password_verify( "123456789" , User::first()->password));


    $routeId  = (new PixelAppGetRouteIdentifier("api/test2"));
    dd(
        PixelAppsConnectionManager::Singleton()->connectOn(PixelTenantAppCentralDomainClient::getClientName())
    ->requestOnRoute($routeId));

//  $response = Http::baseUrl("https://api.stg.companies-management.com")
//     ->get("api/test2");

    // dd(["data" => $response->json() ] );
    
    // $response =  Http::baseUrl("api.stg.companies-management.com")
    // ->get("api/test");

    // return response()->json([
    //     "data" => $response->json()
    // ]);


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

    $company = TenantCompany::latest('id')->first();

    $company->cancelApproving();
    $company->save();

    dump($company->fresh());
    // $company->db_name= "erp_tenant_no_1_database";
    // $company->status = "active";
    // $company->account_type = "company";
    // $company->accepted_at = now();
    // // $company->company_id = "CO-" . random_int(1000, 99999999);
    // // $company->data["db_name"] 

    // $company->save();

 
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
 
 