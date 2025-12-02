<?php

namespace App\Policies\CompanyManagementPolicies;

use PixelApp\Policies\AuthenticationPolicies\CompanyModulePolicies\CompanyModulePolicy;

class CompanyManagementPolicy extends CompanyModulePolicy
{
    
    /**
     * @return bool
     * @throws JsonException
     */
    public function readSignupCompanies(): bool
    {
        return $this->permissionExaminer->addPermissionToCheck("read_signup_companies")
            ->hasPermissionsOrFail();
    }

    /**
     * @return bool
     * @throws JsonException
     */
    public function readApprovedCompanies(): bool
    {
        return $this->permissionExaminer->addPermissionToCheck("read_approved_companies")
            ->hasPermissionsOrFail();
    }

    /**
     * @return bool
     * @throws JsonException
     */
    public function editSignupCompanies(): bool
    {
        return $this->permissionExaminer->addPermissionToCheck("edit_signup_companies")
            ->hasPermissionsOrFail();
    }
    
    /**
     * @return bool
     * @throws JsonException
     */
    public function editApprovedCompanies(): bool
    {
        return $this->permissionExaminer->addPermissionToCheck("edit_approved_companies")
            ->hasPermissionsOrFail();
    }

    /**
     * @return bool
     * @throws JsonException
     */
    public function approveSignupCompany(): bool
    {
        return $this->permissionExaminer->addPermissionToCheck("approve_signup_company")
            ->hasPermissionsOrFail();
    }

    /**
     * @return bool
     * @throws JsonException
     */
    public function rejectSignupCompany(): bool
    {
        return $this->permissionExaminer->addPermissionToCheck("reject_signup_company")
            ->hasPermissionsOrFail();
    }

    /**
     * @return bool
     * @throws JsonException
     */
    public function changeApprovedCompanyStatus(): bool
    {
        return $this->permissionExaminer->addPermissionToCheck("change_approved_company_status")
            ->hasPermissionsOrFail();
    }

}