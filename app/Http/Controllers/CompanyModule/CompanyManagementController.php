<?php

namespace App\Http\Controllers\CompanyModule;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyModule\ReadCompanyRequest;
use App\Http\Resources\CompanyModule\CompaniesResource;
use App\Services\CompanyModule\CompanyManagementService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use PixelApp\Http\Resources\AuthenticationResources\CompanyAuthenticationResources\ModelsResources\TenantCompanyResource;
use PixelApp\Models\CompanyModule\CompanyDefaultAdmin; 

class CompanyManagementController extends Controller
{

    public function __construct(private CompanyManagementService $companyManagementService)
    {
        
    }

    public function index(ReadCompanyRequest $request)
    {
         return $this->logOnFailureOnly(
                    callback : function()
                                {
            
                                    return $this->companyManagementService->index();

                                },
                    operationName : "Tenant Companies Indexing Operation",
                    loggingFailingMsg : "Failed to index tenant companies !"
                );
    }

    public function list(ReadCompanyRequest $request)
    {
          return $this->logOnFailureOnly(
                    callback : function()
                                {
                                    $data = $this->companyManagementService->list();
                                    
                                    return CompaniesResource::collection($data);
                                },
                    operationName : "Tenant Companies Listing Operation",
                    loggingFailingMsg : "Failed to list tenant companies !"
                 );
    }

    public function show(int $company)
    { 
        return $this->logOnFailureOnly(
            callback : function() use ($company)
                        {
    
                            return $this->companyManagementService->show($company);

                        },
                        operationName : "Tenant Company Show Operation",
                        loggingContext  : ['companyId' => $company],
                        loggingFailingMsg : "Failed To Retreive a Tenant Company Row !"
                    );
    }
  
    public function approveCompany(Request $request , int $company) : JsonResponse
    {
        return $this->logOnFailureOnly(
            callback : function() use ($company)
                        {
                            return $this->companyManagementService->approveCompany($company);
                        },  
                        operationName : "Tenant Company Approval Operation",
                        loggingFailingMsg : "Failed to approve tenant company !",
                        loggingContext : [
                            'companyId' => $company
                        ]
                    );
        
    }

    public function rejectCompany(Request $request , int $company) : JsonResponse
    {
        return $this->logOnFailureOnly(
            callback : function() use ($company)
                        {
                            return $this->companyManagementService->rejectCompany($company);
                        },
                        operationName : "Tenant Company Rejection Operation",
                        loggingFailingMsg : "Failed to reject tenant company !",
                        loggingContext : [
                            'companyId' => $company
                        ]
                    );
    }

   public function changeCompanyListStatus(Request $request , int $company): JsonResponse
   {
    return $this->logOnFailureOnly(
        callback : function() use ($company)
                    {
                        return $this->companyManagementService->changeCompanyListStatus($company);
                    },
                        operationName : "Tenant Company List Status Update Operation",
                        loggingFailingMsg : "Failed to update tenant company list status !",
                        loggingContext : [
                            'companyId' => $company
                        ]
                );
   }

   public function updateCompanyEmail(Request $request, int $company)
   {
        return $this->surroundWithTransaction(
                    function () use ( $company): JsonResponse
                    {
                        return $this->companyManagementService->updateCompanyEmail($company);
                    },
                    'Updating Company Email',
                    [
                        'user_id' => Auth::id(),
                        'request' => $request->all(),
                    ]
                );
   }

   
    public function resendVerificationTokenToDefaultAdminEmail(int $company): JsonResponse
    {
        return $this->surroundWithTransaction(
                        function () use ($company)
                        {

                            return $this->companyManagementService->resendVerificationTokenToDefaultAdminEmail($company);
                        },
                        'Resend Verification Token to Default Admin Email',
                        [
                            'user_id' => Auth::id(),
                            'request' => request()->all(),
                        ]
                );
    }

    public function reVerifyEmail(CompanyDefaultAdmin $defaultAdmin): JsonResponse
    {
        return $this->surroundWithTransaction(
                        
                        function() use ($defaultAdmin)
                        {
                            return $this->companyManagementService->reVerifyEmail($defaultAdmin);
                        },
                        "ReVerify Tenant Default Admin's Email", 
                        [
                            'user_id' => Auth::id(),
                            'request' => request()->all(),
                        ]

                );
    } 

    public function signupList(Request $request)
    {
        return $this->logOnFailureOnly(
                    callback : function() use ($request)
                                {

                                    return $this->companyManagementService->getSignupList($request);

                                },
                    operationName : "Signup Companies List Fetching Operation",
                    loggingFailingMsg : "Failed to fetch Signup tenant list !"
                );
    }

    public function companyList(Request $request)
    {
        return $this->logOnFailureOnly(
                    callback : function() use ($request)
                                {

                                    return $this->companyManagementService->getCompanyList($request);

                                },
                    operationName : "Company List Fetching Operation",
                    loggingFailingMsg : "Failed to fetch tenant company List !"
                );
    }






    /**
     * Referance code
     */
//  public function importCompanies(Request $request)
//     {
//         try {
//             BasePolicy::check('create', Company::class);
//             $file = $this->excel->importFile($request);
//             return response()->json(['message' => 'Companies imported successfully', 'file' => $file]);
//         } catch (\Exception $e) {
//             Log::error("Company Import Failed: " . $e->getMessage());
//             return response()->json(['message' => 'Failed to import companies'], 500);
//         }
//     }

//     public function exportCompanies(Request $request)
//     {
//         try {
//             BasePolicy::check('read', Company::class);
//             $file = $this->excel->exportFile($request);
//             return response()->json(['message' => 'Companies exported successfully', 'file' => $file]);
//         } catch (\Exception $e) {
//             Log::error("Company Export Failed: " . $e->getMessage());
//             return response()->json(['message' => 'Failed to export companies'], 500);
//         }
//     }







}
