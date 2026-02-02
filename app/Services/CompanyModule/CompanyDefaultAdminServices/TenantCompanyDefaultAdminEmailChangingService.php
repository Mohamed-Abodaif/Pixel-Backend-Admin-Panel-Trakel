<?php

namespace App\Services\CompanyModule\CompanyDefaultAdminServices;

use App\Models\CompanyModule\TenantCompany;
use Exception;
use PixelApp\CustomLibs\Tenancy\PixelTenancyManager;
use  App\Http\Requests\CompanyModule\CompanyDefaultAdminChangeEmailRequest;
use PixelApp\Models\CompanyModule\CompanyDefaultAdmin;
use PixelApp\Services\UserEncapsulatedFunc\EmailAuthenticatableFuncs\EmailChangerService\EmailChangerService as BaseEmailChangerService;
use PixelApp\Events\TenancyEvents\TenantCompanyEvents\TenantDefaultAdminNewEmailHavingEvent;

class TenantCompanyDefaultAdminEmailChangingService  extends BaseEmailChangerService
{ 
    protected TenantCompany $tenant;

    public function __construct(int $companyId)
    {
        $this->setTenantCompany($companyId);

        if(!$defaultAdmin = $this->getTenantCompanyDefaultAdmin())
        {
            throw new Exception("The tenant company with id = $companyId doesn't have a default admin !");
        }
        
        parent::__construct($defaultAdmin);

        $this->catchModelEmailOldValue();

    }

    protected function setTenantCompany($companyId) : void
    {
        $this->tenant = TenantCompany::findOrFail($companyId);
    }

    /**
     * @return CompanyDefaultAdmin|null
     * @throws Exception
     */
    protected function getTenantCompanyDefaultAdmin() :  ?CompanyDefaultAdmin
    {
        return $this->tenant->defaultAdmin;
    }
   
    protected function getRequestFormClass(): string
    {
        return CompanyDefaultAdminChangeEmailRequest::class ;
    }

    protected function catchModelEmailOldValue() : void
    {
        $emailKey =  $this->model->getEmailColumnName();
        $this->model->catchKeyValueTemporarlly($emailKey);
    }

   protected function syncDataWithTenantApp() : void
   { 
        PixelTenancyManager::handleTenancySyncingData($this->model);  
   }

   protected function fireEmailChangingEvent() : void
   {
        $tenant = $this->tenant;

        //will fire an event f email has changed only
        $this->emailChanger->callOnEmailChange(function() use ($tenant)
        {
            event(new TenantDefaultAdminNewEmailHavingEvent($tenant));
        });
   }

    protected function fireCommittingEvents() : void
    {
        $this->syncDataWithTenantApp();
        $this->fireEmailChangingEvent();
    }

}