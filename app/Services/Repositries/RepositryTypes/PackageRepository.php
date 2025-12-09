<?php

namespace App\Services\Repositries\RepositryTypes;

use App\Models\CompanyModule\Package;
use App\Services\Repositries\RepositryInterfaces\TenantCompanyPackageRepositryInterface;
use Spatie\QueryBuilder\QueryBuilder;

class PackageRepository implements TenantCompanyPackageRepositryInterface
{
    public function getPackages(array $relations = [], array $filters = [])
    {
        return QueryBuilder::for(Package::class)
            ->allowedFilters([...$filters])
            ->with([...$relations])
            ->paginate(request()->pageSize ?? 10);
    }

    public function getListPackages()
    {
        return QueryBuilder::for(Package::class)
            ->allowedFilters(['name'])
            ->customOrdering('created_at', 'desc')
            ->get(['id', 'name']);
    }

    public function getCountPackages()
    {
        return Package::count();
    }

    public function store(array $data): Package
    {
        return Package::create($data);
    }

    public function update(Package $package, array $data): bool
    {
        return $package->update($data);
    }

    public function findById(int $id): ?Package
    {
        return Package::find($id);
    }
}
