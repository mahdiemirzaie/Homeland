<?php

namespace App\Models;

use App\Enums\TableCategoryFildTypeEnum;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Prompts\Table;

class Category extends Model
{
    use HasFactory;
    use HasUuid, SoftDeletes;
    protected $fillable = [
        'uuid',
        'type',
        'parent_id'
    ];

    protected $casts =[
        'type' => TableCategoryFildTypeEnum::class
    ];
    public function children(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id', "id");
    }

    public function parent(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function estates(): HasMany
    {
        return $this->hasMany(estate::class);
    }
}
