<?php

namespace App\Traits;

use App\Models\Fav;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasFav
{
    public function favs(): MorphMany
    {
        return $this->morphMany(Fav::class ,'favable');
    }
}
