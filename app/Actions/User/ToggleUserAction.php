<?php

namespace App\Actions\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ToggleUserAction
{
    public function __construct(private readonly UserRepositoryInterface $repository)
    {
    }

    public function handle(User $user): User
    {
        return DB::transaction(function () use ($user) {
            return $this->repository->toggle($user);
        });
    }
}
