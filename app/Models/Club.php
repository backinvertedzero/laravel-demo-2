<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Club extends Model
{
    public $timestamps = false;
    protected $fillable = ['city_id', 'name'];

    public function translates(): MorphMany
    {
        return $this->morphMany(Translate::class, 'model');
    }
}