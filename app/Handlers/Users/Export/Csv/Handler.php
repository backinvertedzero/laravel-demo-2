<?php

namespace App\Handlers\Users\Export\Csv;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class Handler
{
    public function handle(string $fileName): void
    {
        $path = Storage::disk('public')->path($fileName);

        $handle = fopen($path, 'w');

        fputcsv($handle, ['Фамилия', 'Имя', 'Телефон', 'E-mail']);

        User::query()->chunk(1000, function ($users) use ($handle) {
            foreach ($users as $user) {
                fputcsv($handle, $user->only(['last_name', 'name', 'phone', 'email']));
            }
        });

        fclose($handle);
    }
}