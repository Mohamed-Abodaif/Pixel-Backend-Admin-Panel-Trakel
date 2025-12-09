<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use PixelApp\Helpers\PixelGlobalHelpers;

PixelGlobalHelpers::requirePhpFiles(__DIR__ . '/CompanyModule'); 
  
Route::get("test" , function()
{
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
 
 