<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Category\DeleteCategoryAction;
use App\Actions\Category\StoreCategoryAction;
use App\Actions\Category\UpdateCategoryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends BaseApiController
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, CategoryRepositoryInterface $repository): JsonResponse
    {
        $model = $repository->paginate($request->input('limit', 15), $request->all());
        return $this->successResponse(CategoryResource::collection($model));
    }


    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $this->authorize('create', Category::class);
        $model = StoreCategoryAction::run($request->validated());
        return $this->successResponse(CategoryResource::make($model),
            trans('general.model_has_stored_successfully', ['model' => trans('category.model')]));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $this->authorize('update', $category);
        $model = UpdateCategoryAction::run($category, $request->validated());
        return $this->successResponse(CategoryResource::make($model),
            trans('general.model_has_updated_successfully', ['model' => trans('category.model')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): JsonResponse
    {

        $this->authorize('delete', $category);
        DeleteCategoryAction::run($category);
        return $this->successResponse('',
            trans('general.model_has_deleted_successfully', ['model' => trans('category.model')]));
    }

}
