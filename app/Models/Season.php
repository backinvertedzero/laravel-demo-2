<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Season extends Model
{
    public $timestamps = false;

    protected $fillable = ['start_year', 'end_year'];

}