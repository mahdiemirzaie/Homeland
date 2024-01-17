<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\City\DeleteCityAction;
use App\Actions\City\StoreCityAction;
use App\Actions\City\UpdateCityAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Repositories\City\CityRepositoryInterface;
use Illuminate\Http\JsonResponse;

class CityController extends BaseApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index', 'show');
//        $this->authorizeResource(City::class);
    }

    public function index(CityRepositoryInterface $repository): JsonResponse
    {
        return $this->successResponse(CityResource::collection($repository->paginate()),
        );
    }


    public function store(StoreCityRequest $request)
    {
        $cities = StoreCityAction::run(($request->validated()));
        return $this->successResponse(
            CityResource::make($cities),
            trans('city.success_store'),
            201
        );
    }


    public function show(City $city)
    {
        return $this->successResponse(
            CityResource::make($city)
        );
    }
//->load(['estates'])

    public function Update(UpdateCityRequest $request, City $city)
    {
        $model = UpdateCityAction::run($city, $request->validated());
        return $this->successResponse(
            CityResource::make($model),
            trans('city.success_update'),
            201
        );
    }

    public function destroy(City $city)
    {
        return $this->successResponse(DeleteCityAction::run($city),
            trans('city.success_delete'),
            201
        );
    }
}
