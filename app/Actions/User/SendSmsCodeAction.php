<?php

namespace App\Actions\User;

use App\Models\ActivationCode;
use App\Models\User;
use App\Repositories\ActivationCode\ActivationCodeRepositoryInterface;
use App\Repositories\SmsConfig\SmsConfigRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Carbon;
use Lorisleiva\Actions\Concerns\AsAction;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SendSmsCodeAction
{
    use AsAction;

    public function __construct(
        private readonly ActivationCodeRepositoryInterface $activationCodeRepository,
        private readonly UserRepositoryInterface $userRepository
    ) {
    }

    public function generateCode(int $codeLength = 4): int
    {
        $max = 10 ** $codeLength;
        $min = $max / 10 - 1;
        return random_int($min, $max);
    }
    public function handle(User $user): ActivationCode
    {
        $code = $this->generateCode();
        $user = $this->userRepository->find(value: $user->mobile, field: 'mobile', firstOrFail: true);
        $model = $this->activationCodeRepository->store([
            "code" => $code,
            "user_id" => $user->id,
            "expire_at" => Carbon::now()->addMinutes(5),
        ]);
        return $model;
    }
}
