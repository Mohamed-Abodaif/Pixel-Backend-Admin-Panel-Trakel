<?php

namespace App\Services\CompanyModule\CompanyDefaultAdminServices;

use App\Models\CompanyModule\TenantCompany;
use Exception;
use PixelApp\Models\CompanyModule\CompanyDefaultAdmin;
use PixelApp\Services\AuthenticationServices\CompanyAuthServerServices\DefaultAdminServices\EmailVerificationServices\DefaultAdminVerificationNotificationResendingService as BaseDefaultAdminVerificationNotificationResendingService;

class DefaultAdminVerificationNotificationResendingService extends BaseDefaultAdminVerificationNotificationResendingService
{
    public function __construct(int $companyId)
    {
        $company = $this->fetchTenantCompany($companyId);
        
        if(!$tenantDefaultAdmin = $this->getTenantCompanyDefaultAdmin($company))
        {
            throw new Exception("The tenant company with id = $companyId doesn't have a default admin !");
        }
        
        $this->setAuthenticatable($tenantDefaultAdmin);
    }

    protected function  fetchTenantCompany(int $companyId) : TenantCompany
    {
        return TenantCompany::findOrFail($companyId);
    }

    /**
     * @param TenantCompany $company
     * @return CompanyDefaultAdmin|null
     * @throws Exception
     */
    protected function getTenantCompanyDefaultAdmin(TenantCompany $company) : ?CompanyDefaultAdmin
    {
        return $company->defaultAdmin;
    }
}