<?php

namespace App\Models;

use App\Traits\HasUser;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ActivationCode extends Model
{

    use HasFactory , HasUser ;
    protected $fillable = ['user_id', 'code', 'used', 'expire_at'];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('used',false)->where('expire_at', '>', Carbon::now());
    }
}
