<?php

namespace App\Jobs;

use App\Handlers\Users\Export\Csv\Handler;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ExportUsersToCsv implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private string $fileName)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(Handler $handler): void
    {
        $handler->handle($this->fileName);
    }
}
