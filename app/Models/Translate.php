<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Translate extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'model_type',
        'model_id',
        'language_id',
        'name',
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}