<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PlayersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:players';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task 2';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $results = DB::table('seasons')
            ->select(
                DB::raw("CONCAT(seasons.start_year, '-', seasons.end_year) as season"),
                DB::raw("CONCAT(clubs.name, ' / ', tcl.name) as club"),
                DB::raw("CONCAT(cities.name, ' / ', tc.name) as city"),
                DB::raw("CONCAT(players.fio, ' / ', tp.name) as player")
            )
            ->join('seasons_clubs', 'seasons_clubs.season_id', '=', 'seasons.id')
            ->join('clubs', 'seasons_clubs.club_id', '=', 'clubs.id')
            ->join('translates as tcl', function ($join) {
                $join->on('tcl.model_id', '=', 'clubs.id')
                    ->where('tcl.model_type', '=', 'App\\Models\\Club')
                    ->where('tcl.language_id', '=', 1);
            })
            ->join('cities', 'clubs.city_id', '=', 'cities.id')
            ->join('translates as tc', function ($join) {
                $join->on('tc.model_id', '=', 'cities.id')
                    ->where('tc.model_type', '=', 'App\\Models\\City')
                    ->where('tc.language_id', '=', 1);
            })
            ->join('players', 'clubs.id', '=', 'players.club_id')
            ->join('translates as tp', function ($join) {
                $join->on('tp.model_id', '=', 'players.id')
                    ->where('tp.model_type', '=', 'App\\Models\\Player')
                    ->where('tp.language_id', '=', 1);
            })
            ->orderBy('seasons.id')
            ->get()
            ->map(fn($row) => (array) $row);

        $this->table(['Сезон', 'Клуб', 'Город', 'Игрок'], $results->toArray());
    }
}
