<?php

namespace App\Actions\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateUserAction
{
    use AsAction;

 public function __construct(private readonly UserRepositoryInterface $userRepository)
 {
 }


    public function handle( User $user,array $payload)
    {
        return DB::transaction(function () use ($user ,$payload){
            return $this->userRepository->update($user,$payload);
        });

    }
}
