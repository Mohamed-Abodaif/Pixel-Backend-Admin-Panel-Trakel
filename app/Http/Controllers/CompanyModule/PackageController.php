<?php

namespace App\Http\Controllers\CompanyModule;

use App\Http\Controllers\Controller;
use App\Models\CompanyModule\Package;
use App\Services\CompanyModule\PackageServices\PackageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PackageController extends Controller
{ 

    public function __construct(private PackageService $packageService)
    {
    }

    public function index(Request $request): JsonResponse
    {
        return $this->logOnFailureOnly(
            callback : fn(): JsonResponse => response()->json($this->packageService->getPackages()),
            operationName : 'Package Listing'
        );
    }

    public function list(): JsonResponse
    {
        return $this->logOnFailureOnly(
                    callback :function () {
                            $total = $this->packageService->getCountPackages();
                            $data = $this->packageService->getListPackages();
                            return Response::successList($total, $data);
                    }, 
                    operationName : 'Package List'
                );
    }

    public function show(Package $package): JsonResponse
    {
        return $this->logOnFailureOnly(
                    callback : fn(): JsonResponse => Response::success($this->packageService->show($package)),
                    operationName : 'Package Showing' 
                );
    }



    public function store(PackageRequest $request): JsonResponse
    {
        return $this->surroundWithTransaction(
            function () use ($request): JsonResponse {
                $package = $this->packageService->store($request->validated());
                return Response::success($package, 'Package has been created successfully');
            },
            'Package Creation',
            [
                'user_id' => auth()->id(),
                'request' => $request->validated(),
            ]
        );
    }

    public function update(PackageRequest $request, Package $package): JsonResponse
    {
        return $this->surroundWithTransaction(
            function () use ($request, $package): JsonResponse {
                $updated = $this->packageService->update($package, $request->validated());

                if ($updated) {
                    $package->refresh();
                    return Response::success($package, 'Package has been updated successfully');
                }

                return Response::error('Failed to update package', 500);
            },
            'Package Update',
            [
                'user_id' => auth()->id(),
                'package_id' => $package->id,
                'request' => $request->validated(),
            ]
        );
    }

}
