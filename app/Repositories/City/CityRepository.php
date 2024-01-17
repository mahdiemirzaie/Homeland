<?php

namespace App\Repositories\City;

use App\Models\City;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\QueryBuilder;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    public function __construct(City $model)
    {
        parent::__construct($model);
    }

    public function query(array $payload = []): QueryBuilder|Builder
    {
        return QueryBuilder::for($this->getModel())
            ->with('estates')
//            ->withCount('estates')
//            ->orderByDesc('estates_count')
//            ->limit(3)
//            ->get()
            ->defaultSort('id');
    }
}
