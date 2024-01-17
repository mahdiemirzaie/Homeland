<?php

namespace App\Models;

use App\Enums\TableEstateFildTypeEnum;
use App\Traits\HasComment;
use App\Traits\HasFav;
use App\Traits\HasSchemalessAttributes;
use App\Traits\HasSlug;
use App\Traits\HasUser;
use App\Traits\HasCategory;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Estate extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuid;
    use HasTags;
    use SoftDeletes, HasUser, HasComment ,HasCategory , HasSlug;
    use HasSchemalessAttributes;
    use HasFav;

    protected $casts = [
        'name' => TableEstateFildTypeEnum::class
    ];
    protected $fillable = [
        'area', 'floor', 'WC', 'room', 'type', 'parking', 'elevator'
        , 'storehouse', 'totalPrice', 'mortgage', 'rent', 'category_id', 'city_id', 'user_id',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }


}
