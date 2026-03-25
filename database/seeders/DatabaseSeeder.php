<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Club;
use App\Models\Language;
use App\Models\Player;
use App\Models\Season;
use App\Models\SeasonClub;
use App\Models\Translate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     * 3 клуба, 2 сезона, 5 человек
     */
    public function run(): void
    {
        Season::insert([
            ['start_year' => 2024, 'end_year' => 2025],
            ['start_year' => 2025, 'end_year' => 2026],
        ]);
        Language::insert(['name' => 'English']);
        City::insert(['name' => 'Москва']);
        Translate::insert([
            'model_type' => 'App\Models\City',
            'model_id' => 1,
            'language_id' => 1,
            'name' => 'Moscow',
        ]);

        Club::insert([
            ['city_id' => 1, 'name' => 'Динамо'],
            ['city_id' => 1, 'name' => 'ЦСКА'],
            ['city_id' => 1, 'name' => 'Спартак'],
        ]);

        Translate::insert([
            'model_type' => 'App\Models\Club',
            'model_id' => 1,
            'language_id' => 1,
            'name' => 'Dynamo',
        ]);
        Translate::insert([
            'model_type' => 'App\Models\Club',
            'model_id' => 2,
            'language_id' => 1,
            'name' => 'Cska',
        ]);
        Translate::insert([
            'model_type' => 'App\Models\Club',
            'model_id' => 3,
            'language_id' => 1,
            'name' => 'Spartak',
        ]);

        $players = [
            ['fio' => 'Иванов Петр Иванович', 'club_id' => 1, 'weight' => 78.5, 'height' => 185, 'number' => 10],
            ['fio' => 'Петров Иван Степанович', 'club_id' => 1, 'weight' => 82.0, 'height' => 190, 'number' => 7],
            ['fio' => 'Сидоров Кирилл Петрович', 'club_id' => 2, 'weight' => 75.3, 'height' => 178, 'number' => 23],
            ['fio' => 'Машин Егор Тимофеевич', 'club_id' => 2, 'weight' => 88.1, 'height' => 195, 'number' => 5],
            ['fio' => 'Иванов Степан Николаевич', 'club_id' => 3, 'weight' => 80.0, 'height' => 183, 'number' => 11],
        ];

        Player::insert($players);

        Translate::insert([
            'model_type' => 'App\Models\Player',
            'model_id' => 1,
            'language_id' => 1,
            'name' => 'Ivanov Petr Ivanovich',
        ]);

        Translate::insert([
            'model_type' => 'App\Models\Player',
            'model_id' => 2,
            'language_id' => 1,
            'name' => 'Petrov Ivan Stepanovich',
        ]);

        Translate::insert([
            'model_type' => 'App\Models\Player',
            'model_id' => 3,
            'language_id' => 1,
            'name' => 'Sidorov Cyrill Petrovich',
        ]);

        Translate::insert([
            'model_type' => 'App\Models\Player',
            'model_id' => 4,
            'language_id' => 1,
            'name' => 'Mashin Egor Timofeevich',
        ]);

        Translate::insert([
            'model_type' => 'App\Models\Player',
            'model_id' => 5,
            'language_id' => 1,
            'name' => 'Ivanov Stepan Nikolaevich',
        ]);

        SeasonClub::insert([
            ['season_id' => 1, 'club_id' => 1],
            ['season_id' => 1, 'club_id' => 2],
            ['season_id' => 1, 'club_id' => 3],
            ['season_id' => 2, 'club_id' => 1],
            ['season_id' => 2, 'club_id' => 2],
        ]);
    }
}
