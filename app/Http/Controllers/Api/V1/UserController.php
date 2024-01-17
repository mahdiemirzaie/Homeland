<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\User\DeleteUserAction;
use App\Actions\User\StoreUserAction;
use App\Actions\User\UpdateUserAction;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;

class UserController extends BaseApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index', 'show');
//        $this->authorizeResource(User::class);
    }

    public function index(UserRepositoryInterface $repository): JsonResponse
    {
        return $this->successResponse(UserResource::collection($repository->paginate()));
    }


    public function show(User $user): JsonResponse
    {
        return $this->successResponse(UserResource::make($user));
    }


    public function store(StoreUserRequest $request): JsonResponse
    {     $user = StoreUserAction::run(($request->validated()));
        return $this->successResponse(
            UserResource::make($user),
            trans('general.model_has_stored_successfully',
                ['model' => trans('user.model')]));
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $data = UpdateUserAction::run($user, $request->all());
        return $this->successResponse(UserResource::make($data),trans('general.model_has_updated_successfully', ['model' => trans('user.model')]));
    }


    public function destroy(User $user): JsonResponse
    {
        DeleteUserAction::run($user);
        return $this->successResponse('', trans('general.model_has_deleted_successfully', ['model' => trans('user.model')]));
    }

}
