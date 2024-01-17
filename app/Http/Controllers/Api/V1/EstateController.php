<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Estate\DeleteEstateAction;
use App\Actions\Estate\UpdateEstateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEstateRequest;
use App\Http\Requests\UpdateEstateRequest;
use App\Http\Resources\EstateResource;
use App\Models\Estate;
use App\Repositories\Estate\EstateRepositoryInterface;
use Illuminate\Http\JsonResponse;


class EstateController extends BaseApiController
{
    public function __construct()
    {
        $this->middleware('auth:api');
//        $this->authorizeResource(Estate::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(EstateRepositoryInterface $repository): JsonResponse
    {

        return $this->successResponse(EstateResource::collection($repository->paginate()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Estate $estate)
    {
        return $this->successResponse(
            EstateResource::make($estate)
        );
    }


    public function store(StoreEstateRequest $request): JsonResponse
    {
        $model = StoreEstateRequest::run($request->validated());
        return $this->successResponse(EstateResource::make($model->load('category ', 'city')),
            trans('general.model_has_stored_successfully', ['model' => trans('estate.model')]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstateRequest $request, Estate $estate): JsonResponse
    {
        $data = UpdateEstateAction::run($estate, $request->validated());
        return $this->successResponse(EstateResource::make($data->load('category' , 'city')),
            trans('general.model_has_updated_successfully', ['model' => trans('book.model')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estate $estate): JsonResponse
    {
        DeleteEstateAction::run($estate);
        return $this->successResponse('', trans('general.model_has_deleted_successfully', ['model' => trans('estate.model')]));
    }

}
