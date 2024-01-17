<?php

namespace App\Models;

use App\Traits\HasEstate;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;
    use HasEstate;

    protected $fillable = ['name'];

}
