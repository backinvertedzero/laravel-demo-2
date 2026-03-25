<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Language extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function translates(): HasMany
    {
        return $this->hasMany(Translate::class);
    }
}