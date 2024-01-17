<?php

namespace App\Actions\City;

use App\Models\City;
use App\Repositories\City\CityRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteCityAction
{
    use AsAction;
    public function __construct(private readonly CityRepositoryInterface $repository)
    {
    }

    public function handle(City $city)
    {
        return DB::transaction(function () use($city){
            return $this->repository->delete($city);
        });
    }
}
