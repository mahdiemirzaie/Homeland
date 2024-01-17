<?php

namespace App\Actions\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteUserAction
{
    use AsAction;

    public function __construct(public readonly UserRepositoryInterface $userRepository)
    {
    }

    public function handle(User $user)
    {
        return DB::transaction(function () use ($user){
        return $this->userRepository->delete($user);
        });
    }
}

