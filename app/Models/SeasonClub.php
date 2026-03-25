<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SeasonClub extends Pivot
{
    protected $table = 'seasons_clubs';

    public $timestamps = false;

    protected $fillable = ['season_id', 'club_id'];
}