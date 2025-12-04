<?php 

namespace App\Services\Repositries\RepositryTypes;

use App\Models\CompanyModule\TenantCompany;
use App\Services\Repositries\RepositryInterfaces\TenantCompanyRepostiryInterface;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class TenantCompanyRepostiry implements TenantCompanyRepostiryInterface
{

    protected function initTenantCompanyQueryBuilder() : QueryBuilder
    {
        return QueryBuilder::for(TenantCompany::class);
    }

    public function getSignupList(array $filters = [], Request $request) 
    {
        $query = $this->initTenantCompanyQueryBuilder()
                      ->with('contacts')
                      ->allowedFilters([...$filters])
                      ->datesFiltering()
                      ->customOrdering()
                      ->scopes('signup');

        $this->applyEmailVerificationFilter($query, $request);

        return $query->paginate($request->pageSize ?? 10);
    }

    public function getCompanyList(array $filters = [], Request $request) 
    {
        $query = $this->initTenantCompanyQueryBuilder()
                    ->with('contacts')
                    ->allowedFilters( [...$filters] )
                    ->datesFiltering()
                    ->customOrdering()
                    ->scopes('approved');

        $this->applyEmailVerificationFilter($query, $request);
                    
        return $query->paginate($request->pageSize ?? 10);
    }

    public function index(array $filter = [])
    {
        return $this->initTenantCompanyQueryBuilder()
                    ->allowedFilters([...$filter])
                    ->datesFiltering()
                    ->customOrdering()
                    ->paginate(request()->pageSize ?? 10);
    }

    public function list()
    {
        return $this->initTenantCompanyQueryBuilder()
                    ->allowedFilters(['name'])
                    ->customOrdering('created_at', 'desc')
                    ->get(['id' , "name" , "company_id"]);
    }

    public function getCompanyByEmail(string $email)
    {
        return TenantCompany::whereAdminEmail($email)->first();
    }

    public function findById(int $companyId): ?TenantCompany
    {
        return TenantCompany::find($companyId);
    }

    public function findByIdOrFail(int $companyId): TenantCompany
    {
        return TenantCompany::findOrFail($companyId);
    }
     private function getEmailVerificationConditinalParameters(Request $request) : array
    {
        $verificationColumn = 'email_verified_at';
        $verificationDefaultStatus = 'verified';
        $status = $request->input('filter.email_verified_at')  ?? $verificationDefaultStatus;
         
        if($status == 'unverified')
        {
            return [$verificationColumn , null];
        }

        return [$verificationColumn , "!=" , null];
    }

    private function applyEmailVerificationFilter($query, Request $request) 
    {
        $verificationConditinalParams = $this->getEmailVerificationConditinalParameters($request);

        $query->whereHas("defaultAdmin" , function($relation) use ( $verificationConditinalParams )
        {
            $relation->where( ...$verificationConditinalParams );
        });
    }


}