<?php

namespace App\Console\Commands;

use App\Jobs\ExportUsersToCsv;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class UsersExportCsvCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:users-export-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task 3';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fileName = 'users_' . time() . '.csv';

        ExportUsersToCsv::dispatch($fileName);
        $storage = Storage::disk('public');

        $run = true;
        $progressBar = $this->output->createProgressBar(User::count() / 1000);
        $progressBar->start();
        while ($run) {
            if ($storage->exists($fileName)) {
                $run = false;
                $progressBar->finish();
                $this->newLine(3);
                $this->info("Ссылка: ");
                $this->line(Storage::disk('public')->url($fileName));
            }
        }
    }
}
