<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Fav extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'favable_type',
        'favable_id',
    ];
    public function favable(): MorphTo
    {
        return $this->morphTo();
    }
}
