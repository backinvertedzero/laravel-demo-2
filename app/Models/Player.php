<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Player extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'club_id',
        'name',
        'weight',
        'height',
        'number',
    ];

    protected $casts = [
        'weight' => 'decimal:2',
        'height' => 'integer',
        'number' => 'integer',
    ];

    public function translates(): MorphMany
    {
        return $this->morphMany(Translate::class, 'model');
    }
}