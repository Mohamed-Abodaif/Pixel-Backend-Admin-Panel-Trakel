<?php 

namespace App\Services\CompanyModule;

use App\Models\CompanyModule\TenantCompany;
use App\Services\CompanyModule\CompanyDefaultAdminServices\DefaultAdminVerificationNotificationResendingService;
use App\Services\CompanyModule\CompanyDefaultAdminServices\TenantCompanyDefaultAdminEmailChangingService;
use App\Services\CompanyModule\StatusChangerServices\CompanyTypeStatusChangers\CompanyAccountStatusChanger;
use App\Services\CompanyModule\StatusChangerServices\CompanyTypeStatusChangers\SignUpCompanyStatusChangerServices\SignUpAccountApprovingService;
use App\Services\CompanyModule\StatusChangerServices\CompanyTypeStatusChangers\SignUpCompanyStatusChangerServices\SignUpAccountRejectingService;
use PixelApp\Services\AuthenticationServices\CompanyAuthServerServices\DefaultAdminServices\EmailVerificationServices\DefaultAdminVerificationNotificationResendingService as DefaultAdminVerificationNotificationResendingBaseService;
use App\Services\Repositries\RepositryInterfaces\TenantCompanyRepostiryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PixelApp\Http\Resources\AuthenticationResources\CompanyAuthenticationResources\ModelsResources\TenantCompanyResource;
use PixelApp\Models\CompanyModule\CompanyDefaultAdmin;
use App\Models\ModelConfigs\TenantCompanyConfig;

class CompanyManagementService
{

    protected ?TenantCompanyRepostiryInterface $tenantCompanyRepostiry = null;

    protected function initTenantCompanyManagementRepostiry() : TenantCompanyRepostiryInterface
    {
        if(!$this->tenantCompanyRepostiry)
        {
            $this->tenantCompanyRepostiry = app(TenantCompanyRepostiryInterface::class);
        }

        return $this->tenantCompanyRepostiry;
    }

    public function index() 
    {
         return [
            'list' => $this->initTenantCompanyManagementRepostiry()
                           ->index( TenantCompanyConfig::getIndexingFilters()),

            'permissions' => [],
            'statistics' => [],
        ];
    }
    
    public function list()
    {
        return $this->initTenantCompanyManagementRepostiry()->list();
    }

    protected function findByIdOrFail(int $companyId)  : TenantCompany
    {
        return $this->initTenantCompanyManagementRepostiry()->findByIdOrFail($companyId);
    }

    public function show(int $companyId): TenantCompanyResource
    {
        $company = $this->findByIdOrFail($companyId);
        return (new TenantCompanyResource($company ));
    }
    
    public function getSignupList(Request $request): array
    {
        $requestFilters = TenantCompanyConfig::getSignupListFilters();
        $data = $this->initTenantCompanyManagementRepostiry()->getSignupList($requestFilters, $request);

        return [
            'list' => $data,
            'statistics' => []
        ];
    }

    public function getCompanyList(Request $request): array
    {
        $requestFilters = TenantCompanyConfig::getCompanyListFilters();
        $data = $this->initTenantCompanyManagementRepostiry()->getCompanyList($requestFilters , $request);

        return [
            'list' => $data,
            'statistics' => []
        ];
    }

    public function resendVerificationTokenToDefaultAdminEmail(int $companyId)
    {
        return (new DefaultAdminVerificationNotificationResendingService($companyId))->resend();
    }

    public function reVerifyEmail(CompanyDefaultAdmin $defaultAdmin)
    {
        return (new DefaultAdminVerificationNotificationResendingBaseService())->setAuthenticatable($defaultAdmin)->resend();
    }

    public function approveCompany(int $companyId) : JsonResponse
    {
        return (new SignUpAccountApprovingService($companyId))->change();
    }

    public function rejectCompany(int $companyId) : JsonResponse
    {
        return (new SignUpAccountRejectingService($companyId))->change();
    }

    function changeCompanyListStatus(int $companyId): JsonResponse
    {
        return (new CompanyAccountStatusChanger($companyId))->change();
    }

    public function updateCompanyEmail(int $companyId): JsonResponse
   {
       return (new TenantCompanyDefaultAdminEmailChangingService($companyId))->change(); 
   }

}