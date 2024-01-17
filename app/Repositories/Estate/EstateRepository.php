<?php

namespace App\Repositories\Estate;

use App\Models\Estate;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\QueryBuilder;

class EstateRepository extends BaseRepository implements EstateRepositoryInterface
{
    public function __construct(Estate $model)
    {
        parent::__construct($model);
    }



    public function query(array $payload = []): QueryBuilder|Builder
    {

        return QueryBuilder::for($this->getModel())
            ->defaultSort('-id')
          ->with(['city','category']);


    }

    public function home()
    {

    }


}
