<?php

namespace App\Repositories\ActivationCode;

use App\Models\ActivationCode;
use App\Models\User;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ActivationCodeRepository extends BaseRepository implements ActivationCodeRepositoryInterface
{
    public function __construct(ActivationCode $model)
    {
        parent::__construct($model);

    }

    public function getModel(): Model
    {
        return parent::getModel();
    }


    public function checkCode(User $user, string $code): ActivationCode|null
    {
        return $this->getModel()
            ->where('code', $code)
            ->active()
            ->where('user_id', $user->id)
            ->first();
    }

    public function useCode(ActivationCode $activationCode): ActivationCode
    {
        $activationCode->update(['used' => true]);
        return $activationCode;
    }
}
